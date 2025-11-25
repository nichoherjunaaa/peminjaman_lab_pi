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
    public function index(Request $request)
    {
        $tanggal_peminjaman = Peminjaman::select('tanggal')
            ->distinct()
            ->get();

        $laboratorium = Peminjaman::select('id_laboratorium')
            ->distinct()
            ->get();

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

        $filterTanggal = $request->input('tanggal');
        $filterLab = $request->input('laboratorium');

        $list_peminjaman = Peminjaman::with(['peminjam', 'laboratorium'])
            ->when(!$admin, function ($query) use ($peminjamKey) {
                $query->where('id_peminjam', $peminjamKey);
            })
            ->when($filterTanggal, function ($query) use ($filterTanggal) {
                $query->where('tanggal', $filterTanggal);
            })
            ->when($filterLab, function ($query) use ($filterLab) {
                $query->where('id_laboratorium', $filterLab);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('pages.borrowing', compact(
            'list_peminjaman',
            'namaPeminjam',
            'tanggal_peminjaman',
            'laboratorium'
        ));
    }

    public function create(Request $request)
    {
        $lab_id = $request->query('lab_id') ?? 0;
        $tanggal = $request->query('tanggal') ?? date('Y-m-d');
        $jam_mulai = $request->query('jam_mulai') ?? '00:00';
        $jam_selesai = $request->query('jam_selesai') ?? '00:00';
        $laboratorium = Laboratorium::all();
        return view('pages.submission', compact('laboratorium', 'lab_id', 'tanggal', 'jam_mulai', 'jam_selesai'));

    }

    public function store(Request $request)
    {
        dd($request->all());
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

        $existingBooking = Peminjaman::where('id_laboratorium', $request->id_laboratorium)
            ->whereDate('tanggal', $request->tanggal)
            ->where('status', 'approved')
            ->where(function ($q) use ($request) {
                $q->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q2) use ($request) {
                        $q2->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })
            ->exists();

        if ($existingBooking) {
            return back()->with('error', 'Laboratorium sudah dipinjam pada tanggal dan jam yang dipilih. Silakan pilih waktu lain.');
        }

        try {
            Peminjaman::create([
                'id_peminjam' => $user->username,
                'peminjam_type' => $user->role,
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
        $peminjaman->alasan_penolakan = $request->alasan_penolakan;
        $peminjaman->save();
        return redirect()->route('borrowing.index')->with('success', 'Peminjaman berhasil disetujui!');
    }
    public function report(Request $request)
    {
        // dd($request->all());
        $filter = $request->input('filter', 'all');
        $status = $request->input('status', 'all');
        $lab_id = $request->input('id_laboratorium', 'all');

        $query = Peminjaman::query();

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

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($lab_id !== 'all') {
            $query->where('laboratorium_id', $lab_id);
        }

        $peminjaman_count = $query->count();
        $laboratoriums = Laboratorium::all();

        return view('pages.report', compact('peminjaman_count', 'filter', 'status', 'lab_id', 'laboratoriums'));
    }

}