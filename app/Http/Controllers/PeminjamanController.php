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
    public function update(Request $request){
        $validate == $request->validate([
            'id'=>'required|exists:peminjaman_lab,id',
            'status'=>'required|in:setuju,tolak',
            'alasan'=>'nullable|string',
        ]);
    }
}

