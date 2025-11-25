<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Fasilitas;
use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::paginate(12);
        $jumlah_tersedia = Laboratorium::where('status', 'tersedia')->count();
        $lokasiOnly = Laboratorium::select('lokasi')
            ->distinct()
            ->get();

        return view('pages.laboratorium', compact('laboratorium', 'lokasiOnly', 'jumlah_tersedia'));
    }

    public function show($id)
    {
        $peminjaman_bulan = Peminjaman::whereMonth('tanggal', now()->month)->count();
        $fasilitas = Fasilitas::with('barang')->where('id_laboratorium', $id)->get();
        $lab = Laboratorium::with('fasilitas.barang')->findOrFail($id);
        return view('pages.laboratorium-details', compact('lab', 'peminjaman_bulan', 'fasilitas'));
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
    public function edit($id)
    {
        $data = Laboratorium::findOrFail($id);
        $barangList = Barang::all();
        $fasilitas = Fasilitas::where('id_laboratorium', $id)->get();
        return view('pages.laboratorium-edit', compact('data', 'barangList', 'fasilitas'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_laboratorium' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required',
            'luas' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'barang_id' => 'array',
            'jumlah' => 'array',
        ]);

        $lab = Laboratorium::findOrFail($id);
        $lab->update($request->only(['nama_laboratorium', 'lokasi', 'kapasitas', 'status', 'luas', 'deskripsi']));

        Fasilitas::where('id_laboratorium', $id)->delete();

        foreach ($request->barang_id as $i => $barangId) {
            Fasilitas::create([
                'id_laboratorium' => $id,
                'id_barang' => $barangId,
                'jumlah' => $request->jumlah[$i],
            ]);
        }

        return redirect()->route('laboratorium.index')->with('success', 'Data berhasil diperbarui');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_laboratorium' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|string',
            'luas' => 'nullable|numeric|min:0',
            'deskripsi' => 'nullable|string',

            'barang_id' => 'required|array',
            'barang_id.*' => 'integer|exists:barang,id_barang',

            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
        ]);

        $lab = Laboratorium::create([
            'nama_laboratorium' => $request->nama_laboratorium,
            'lokasi' => $request->lokasi,
            'kapasitas' => $request->kapasitas,
            'status' => $request->status,
            'luas' => $request->luas,
            'deskripsi' => $request->deskripsi,
        ]);

        foreach ($request->barang_id as $index => $barangId) {
            Fasilitas::create([
                'id_laboratorium' => $lab->id_laboratorium,
                'id_barang' => $barangId,
                'jumlah' => $request->jumlah[$index],
            ]);
        }

        return redirect()->route('laboratorium.index')
            ->with('success', 'Data berhasil disimpan');
    }


    public function laboratorium_add()
    {
        $barangList = Barang::all();
        return view('pages.laboratorium-add', compact('barangList'));
    }


}


