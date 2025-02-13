<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on user role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->role;

        // Arahkan pengguna berdasarkan perannya
        if ($role === 'admin') {
            return view('home'); // Dashboard untuk Admin
        } elseif ($role === 'petugas') {
            return view('home2'); // Dashboard untuk Petugas
        } else {
            abort(403, 'Akses ditolak. Role tidak dikenali.');
        }
    }
}
