<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $guarded = ['id'];

    public function siswa(){
        return $this->belongsToMany(siswa::class);
    }
}
