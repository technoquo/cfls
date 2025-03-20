<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organe extends Model
{
    public function administration()
    {
        return $this->hasMany(Administration::class);
    }
}
