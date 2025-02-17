<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->role == 'petugas') {
            return redirect()->route('dashboard.petugas');
        }

        return redirect()->route('home'); // Default jika peran tidak dikenali
    }
}
