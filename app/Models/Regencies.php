<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    protected $table = 'reg_regencies';

    public function reg_districts()
    {
        return $this->hasMany(reg_districts::class);
    }
}
