<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = ['user_id', 'slug', 'score', 'played_at'];

    protected $casts = [
        'played_at' => 'date', // <- Esto hace que sea Carbon automáticamente
    ];
}
