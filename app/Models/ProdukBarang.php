<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBarang extends Model
{

protected $fillable = ['nama_produk', 'kategori_barangs_id'];


public function kategori_barangs()
{
return $this->belongsTo(KategoriBarang::class, 'kategori_barangs_id','id'   );
}
}
