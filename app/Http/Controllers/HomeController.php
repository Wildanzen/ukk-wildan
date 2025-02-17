<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        return view('/dashboard.admin'); // Pastikan file ini ada di resources/views/admin/dashboard.blade.php
    }

    public function petugasDashboard()
    {
        return view('/dashboard.petugas'); // Pastikan file ini ada di resources/views/petugas/dashboard.blade.php
    }
}
