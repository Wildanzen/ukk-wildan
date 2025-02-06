<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapelSiswa extends Model
{
    protected $guarded = ['id'];

    public function mapel(){
        return $this->belongsToMany(mapel::class);
    }

    public function siswa(){
        return $this->belongsToMany(siswa::class,'mapel_id');
    }
}
