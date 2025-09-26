<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'syllabu_id',
        'video_id',
        'question_text',
        'type',
        'options',
        'answer'
    ];

    protected $casts = [
        'options' => 'array', // convierte JSON a array automáticamente
    ];

    public function syllabus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }

    public function video()
    {
        return $this->belongsTo(VideoTheme::class, 'video_id');
    }
}