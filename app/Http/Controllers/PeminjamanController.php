<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Laboratorium;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use Auth;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function create()
    {
        $laboratorium = Laboratorium::all();
        return view('pages.ajuan', compact('laboratorium'));
    }

    public function index()
    {
        $list_peminjaman = Peminjaman::with(['peminjam', 'laboratorium'])->get();
        return view('pages.peminjaman', compact('list_peminjaman'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_laboratorium' => 'required',
            'nama_kegiatan' => 'required|string|max:150',
            'keperluan' => 'nullable|string',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $user = Auth::user();

        // Tentukan apakah user mahasiswa atau dosen
        $peminjam = Mahasiswa::where('nim', $user->username)->first()
            ?? Dosen::where('nip', $user->username)->first();

        if (!$peminjam) {
            return back()->with('error', 'Data peminjam tidak ditemukan.');
        }

        Peminjaman::create([
            'id_peminjam' => $peminjam->getKey(),
            'peminjam_type' => get_class($peminjam) === Mahasiswa::class ? 'mahasiswa' : 'dosen', 
            'id_laboratorium' => $request->id_laboratorium,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'nama_kegiatan' => $request->nama_kegiatan,
            'keperluan' => $request->keperluan,
            'status' => 'pending',
            'created_at' => now(),
        ]);

        return redirect()->route('booking.index')->with('success', 'Peminjaman berhasil diajukan!');
    }

}
