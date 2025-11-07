<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crossword extends Model
{
    use HasFactory;

    protected $casts = [
        // La estructura final del tablero, con palabras y posiciones, se guarda como JSON
        'board_data' => 'array',
    ];

    protected $fillable = [
        'title',
        'size_x',
        'size_y',
        'board_data',
    ];
}