<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disricts extends Model
{
    protected $table = 'reg_districts';

    public function reg_districts()
    {
        return $this->hasMany(reg_villages::class);
    }
}
