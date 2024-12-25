<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengembalikan tampilan dashboard admin
        return view('admin.dashboard'); // Pastikan Anda membuat blade admin.dashboard
    }
}
