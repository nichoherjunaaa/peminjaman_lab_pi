<?php
namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Laboratorium;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function create()
    {
        $laboratorium = Laboratorium::all();
        return view('pages.submission', compact('laboratorium'));
    }


    public function index()
    {
        $user = auth()->user();
        $admin = $user->role === 'admin';
        $peminjamKey = $user->username;

        if ($user->isMahasiswa()) {
            $peminjam = Mahasiswa::where('nim', $peminjamKey)->first();
            $namaPeminjam = $peminjam->nama ?? 'Tidak Diketahui';
        } elseif ($user->isDosen()) {
            $peminjam = Dosen::where('nip', $peminjamKey)->first();
            $namaPeminjam = $peminjam->nama ?? 'Tidak Diketahui';
        } elseif ($admin) {
            $peminjam = null;
            $namaPeminjam = 'Admin';
        } else {
            $peminjam = null;
            $namaPeminjam = 'Tidak Diketahui';
        }

        if (!$admin && !$peminjam) {
            return back()->with('error', 'Data peminjam tidak ditemukan.');
        }

        $list_peminjaman = Peminjaman::with(['peminjam', 'laboratorium'])
            ->when(!$admin, function ($query) use ($peminjamKey) {
                $query->where('id_peminjam', $peminjamKey);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.borrowing', compact('list_peminjaman', 'namaPeminjam'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_laboratorium' => 'required',
            'nama_kegiatan' => 'required|string|max:150',
            'keperluan' => 'nullable|string',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $user = Auth::user();

        try {
            Peminjaman::create([
                'id_peminjam' => $user->username, // ambil dari tabel users, bukan mahasiswa/dosen
                'peminjam_type' => $user->role, // langsung ambil dari kolom role di tabel users
                'id_laboratorium' => $request->id_laboratorium,
                'tanggal' => $request->tanggal,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'nama_kegiatan' => $request->nama_kegiatan,
                'keperluan' => $request->keperluan,
                'status' => 'pending',
                'created_at' => now(),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }


        return redirect()->route('borrowing.index')->with('success', 'Peminjaman berhasil diajukan!');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['peminjam', 'laboratorium'])->findOrFail($id);
        return view('pages.submission-details', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = $request->status;
        $peminjaman->save();
        return redirect()->route('borrowing.index')->with('success', 'Peminjaman berhasil disetujui!');
    }
    public function report(Request $request)
    {
        // dd($request->all());
        $filter = $request->input('filter', 'all'); // periode waktu
        $status = $request->input('status', 'all'); // status peminjaman
        $lab_id = $request->input('id_laboratorium', 'all'); // laboratorium

        $query = Peminjaman::query();

        // --- Filter waktu ---
        switch ($filter) {
            case 'weekly':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'monthly':
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
                break;
            case '3months':
                $query->where('created_at', '>=', Carbon::now()->subMonths(3));
                break;
            case '6months':
                $query->where('created_at', '>=', Carbon::now()->subMonths(6));
                break;
            case 'yearly':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        // --- Filter status ---
        if ($status !== 'all') {
            $query->where('status', $status);
        }

        // --- Filter laboratorium ---
        if ($lab_id !== 'all') {
            $query->where('laboratorium_id', $lab_id);
        }

        $peminjaman_count = $query->count();
        $laboratoriums = Laboratorium::all();

        return view('pages.report', compact('peminjaman_count', 'filter', 'status', 'lab_id', 'laboratoriums'));
    }

}

