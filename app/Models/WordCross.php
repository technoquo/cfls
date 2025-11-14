<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCross extends Model
{
    protected $table = 'word_crosses';
    use HasFactory;


    protected $fillable = [
        'text',
        'clue',
        'length',
        'difficulty',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryMotCross::class, 'category_mot_crosses_id');
    }
}
