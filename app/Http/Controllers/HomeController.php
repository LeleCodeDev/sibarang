<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('layout.homepage');
    }

    public function indexHome() {
        $username = Auth::user()->name;

        return view('Peminjam.home', compact('username'));
    }
}
