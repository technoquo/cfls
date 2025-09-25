<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['video_id', 'question_text'];

    public function video()
    {
        return $this->belongsTo(VideoTheme::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
