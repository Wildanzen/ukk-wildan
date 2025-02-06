<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    protected $guarded = ['id'];

    public function showroom(){
        return $this->belongsTo(kendaraan::class);
    }
}
