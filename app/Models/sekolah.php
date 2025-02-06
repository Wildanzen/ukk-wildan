<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kelas_id', 'id');
    }
}
