<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class showroom extends Model
{
    protected $guarded = ['id'];

    public function kendaraan(){
        return $this->hasMany(kendaraan::class);
    }
}
