<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $laboratorium_tersedia = Laboratorium::where('status', 'tersedia')->count();
        $peminjaman = Peminjaman::all();

        return view('pages.home', compact('laboratorium_tersedia', 'peminjaman'));
    }
}
