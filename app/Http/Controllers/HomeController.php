<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }
}
