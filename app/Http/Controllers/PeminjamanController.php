<?php
namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Laboratorium;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use Auth;
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


        return redirect()->route('booking.index')->with('success', 'Peminjaman berhasil diajukan!');
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

}

