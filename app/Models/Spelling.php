<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spelling extends Model
{

    protected $fillable = [
        'word',
        'active',
    ];
}
