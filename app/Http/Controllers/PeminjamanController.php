<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function create()
    {
        $laboratorium = Laboratorium::all();
        return view('pages.ajuan', compact('laboratorium'));
    }
}
