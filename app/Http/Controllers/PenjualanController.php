<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('barang')->get();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('penjualan.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_penjualan' => 'required|date|after_or_equal:today',
        ], [
            'barang_id.required' => 'Barang harus dipilih.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah minimal adalah 1.',
            'tanggal_penjualan.required' => 'Tanggal penjualan wajib diisi.',
            'tanggal_penjualan.date' => 'Tanggal penjualan harus berupa tanggal yang valid.',
            'tanggal_penjualan.after_or_equal' => 'Tanggal penjualan tidak boleh kurang dari hari ini.',
        ]);

        // Cari barang berdasarkan ID
        $barang = Barang::findOrFail($validatedData['barang_id']);

        // Periksa stok barang
        if ($barang->stok < $validatedData['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok barang tidak mencukupi.']);
        }

        // Kurangi stok barang
        $barang->stok -= $validatedData['jumlah'];
        $barang->save();

        // Tambahkan harga barang ke data penjualan
        $validatedData['harga'] = $barang->harga * $validatedData['jumlah']; // Total harga = harga satuan x jumlah

        // Simpan data penjualan
        Penjualan::create($validatedData);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan dan stok barang diperbarui.');
    }

    public function show($id)
    {
        // Ambil data penjualan berdasarkan ID
        $penjualan = Penjualan::with('barang')->findOrFail($id);

        // Tampilkan view detail penjualan
        return view('penjualan.show', compact('penjualan'));
    }

    public function destroy(Penjualan $penjualan)
    {
        // Kembalikan stok barang
        $barang = Barang::find($penjualan->barang_id);
        if ($barang) {
            $barang->stok += $penjualan->jumlah;
            $barang->save();
        }

        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus dan stok barang diperbarui.');
    }
}
