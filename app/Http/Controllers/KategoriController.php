<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->merge(['nama_kategori' => trim($request->nama_kategori)]); // Menghilangkan spasi awal/akhir

        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori|max:255',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada, silakan gunakan nama lain.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ]);

        try {
            Kategori::create($validated);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.')->with('modal', 'tambah');
        }
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->merge(['nama_kategori' => trim($request->nama_kategori)]);

        $validated = $request->validate([
            'nama_kategori' => 'required|max:255|unique:kategori,nama_kategori,' . $kategori->id,
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada, silakan gunakan nama lain.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ]);

        try {
            $kategori->update($validated);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.')->with('modal', 'edit_' . $kategori->id);
        }
    }

    public function destroy(Kategori $kategori)
    {
        try {
            // Cek apakah kategori digunakan di tabel lain sebelum menghapus
            if ($kategori->barang()->exists()) {
                return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan di tabel lain.');
            }

            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
        } catch (QueryException $e) {
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
