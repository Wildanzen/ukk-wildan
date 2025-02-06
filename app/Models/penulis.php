<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    protected $guarded = ['id'];

    public function buku(){
        return $this->hasMany(buku::class);
    }
}
