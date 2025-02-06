<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employ extends Model
{
    protected $fillable = ['employ_name','company_id'];

    public function company()
    {
        return $this->belongsTo(company::class, 'company_id');
    }
}
