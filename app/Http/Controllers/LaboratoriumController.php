<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::all();

        $lokasiOnly = Laboratorium::select('lokasi')
            ->distinct()
            ->get();

        return view('pages.laboratorium', compact('laboratorium', 'lokasiOnly'));
    }

    public function show($id)
    {
        $lab = Laboratorium::with('fasilitas.barang')->findOrFail($id);
        return view('pages.detail_lab', compact('lab'));
    }

    public function destroy($id)
    {
        $lab = Laboratorium::findOrFail($id);
        $lab->delete();
        return response()->json(['success' => true]);
    }
}

