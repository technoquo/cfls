<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Syllabu;
use App\Models\Theme;
use App\Models\VideoTheme;


class Question extends Model
{
    protected $fillable = [
        'syllabu_id',
        'theme_id',
        'video_id',
        'question_text',
        'type',
        'options',
        'answer'
    ];

    public $timestamps = true;

    protected $casts = [
        'options' => 'array', // convierte JSON a array automáticamente
    ];

    public function syllabus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }

    public function theme(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Theme::class, 'theme_id'); // 👈 belongsTo, no hasMany
    }

    public function video()
    {
        return $this->belongsTo(VideoTheme::class, 'video_id');
    }


}