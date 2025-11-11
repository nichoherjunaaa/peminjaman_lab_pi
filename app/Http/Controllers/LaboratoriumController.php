<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::paginate(6);
        $jumlah_tersedia = Laboratorium::where('status', 'tersedia')->count();
        $lokasiOnly = Laboratorium::select('lokasi')
            ->distinct()
            ->get();

        return view('pages.laboratorium', compact('laboratorium', 'lokasiOnly', 'jumlah_tersedia'));
    }

    public function show($id)
    {
        $lab = Laboratorium::with('fasilitas.barang')->findOrFail($id);
        return view('pages.laboratorium-details', compact('lab'));
    }

    public function destroy($id)
    {
        $lab = Laboratorium::findOrFail($id);
        $lab->delete();
        return response()->json(['success' => true]);
    }

    public function show_booking($id)
    {
        $lab = Laboratorium::with(['peminjaman.peminjam'])->findOrFail($id);

        // Bentuk data agar sesuai format bookingData di frontend
        $data = $lab->peminjaman
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            })
            ->map(function ($peminjamanList) use ($lab) {
                return $peminjamanList->map(function ($p) use ($lab) {
                    return [
                        'id' => $p->id_peminjaman,
                        'lab' => $lab->nama_laboratorium,
                        'kegiatan' => $p->nama_kegiatan,
                        'waktu' => \Carbon\Carbon::parse($p->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::parse($p->jam_selesai)->format('H:i'),
                        'peminjam' => $p->peminjam->nama ?? 'Tidak diketahui',
                        'status' => strtolower($p->status),
                        'jenis' => strtolower(class_basename($p->peminjam_type)),
                    ];
                });
            });

        return response()->json($data);
    }
}

