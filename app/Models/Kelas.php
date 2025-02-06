<?php

namespace App\Models;

use App\Models\Siswa;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function siswa()
    {
        return $this->hasMany(Siswa::class,'kelas_id','id');
    }

    public function sekolah()
    {
        return $this->belongsto(Sekolah::class, 'Sekolah_id', 'id');
    }
}
