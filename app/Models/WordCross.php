<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCross extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'clue',
        'length',
        'difficulty',
    ];
}
