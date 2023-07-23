<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'reg_provinces';

    public function reg_regencies()
    {
        return $this->hasMany(req_regencies::class);
    }
}
