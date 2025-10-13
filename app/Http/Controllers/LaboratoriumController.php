<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::with(['fasilitas.barang'])->get();
        return view('pages.laboratorium', compact('laboratorium'));
    }
}
