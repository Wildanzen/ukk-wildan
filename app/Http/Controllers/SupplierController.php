<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        // Mengurutkan data supplier berdasarkan `created_at` terbaru
        $supplier = Supplier::orderBy('created_at', 'desc')->get();

        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255|unique:supplier,nama_supplier',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15|unique:supplier,kontak',
        ], [
            'nama_supplier.required' => 'Nama supplier harus diisi.',
            'nama_supplier.string' => 'Nama supplier harus berupa teks.',
            'nama_supplier.max' => 'Nama supplier tidak boleh lebih dari 255 karakter.',
            'nama_supplier.unique' => 'Nama supplier sudah ada, silakan gunakan nama lain.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'kontak.required' => 'Kontak harus diisi.',
            'kontak.string' => 'Kontak harus berupa teks.',
            'kontak.max' => 'Kontak tidak boleh lebih dari 15 karakter.',
            'kontak.unique' => 'Kontak sudah digunakan oleh supplier lain.',
        ]);

        $createSupplier = Supplier::create($request->all());

        if ($createSupplier) {
            return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan supplier.');
        }
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_supplier' => 'required|max:255|unique:supplier,nama_supplier,' . $supplier->id,
            'alamat' => 'required',
            'kontak' => 'nullable|max:15|unique:supplier,kontak,' . $supplier->id,
        ], [
            'nama_supplier.required' => 'Nama supplier harus diisi.',
            'nama_supplier.max' => 'Nama supplier tidak boleh lebih dari 255 karakter.',
            'nama_supplier.unique' => 'Nama supplier sudah ada, silakan gunakan nama lain.',
            'alamat.required' => 'Alamat harus diisi.',
            'kontak.max' => 'Kontak tidak boleh lebih dari 15 karakter.',
            'kontak.unique' => 'Kontak sudah digunakan oleh supplier lain.',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();

            return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Kode error untuk foreign key constraint
                return redirect()->route('supplier.index')->with('error', 'Data ini masih digunakan dan tidak bisa dihapus.');
            }

            return redirect()->route('supplier.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }
}
