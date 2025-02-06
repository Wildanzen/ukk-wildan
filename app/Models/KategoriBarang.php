<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    // Opsional: Relasi ke ProdukBarang
    public function produk_barangs()
    {
        return $this->hasMany(ProdukBarang::class, 'kategori_barangs_id','id');
    }
}
