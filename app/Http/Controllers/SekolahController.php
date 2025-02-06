<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;
class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa =Sekolah::with('kelas')->get();

        foreach ($siswa as $wildan) {
            echo "Nama Siswa: " . $wildan->nama . "<br>";
            echo "Kelas: " . $wildan->kelas->nama_kelas . "<br>";
            echo "Sekolah: " . $wildan->kelas->sekolah->nama_sekolah . "<br>";
            echo "<br>";
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
