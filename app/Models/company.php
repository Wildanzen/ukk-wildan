<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    // Menyatakan kolom yang dapat diisi pada model Company
    protected $fillable = ['company_name'];

    /**
     * Relasi ke model Employ (Satu perusahaan bisa memiliki banyak pegawai)
     */
    public function employ()
    {
        return $this->belongsTo(Employ::class, 'company_id');
    }
}
