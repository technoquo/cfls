<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTheme extends Model
{
    protected $table = 'video_themes_cloudinary';

    public function syllabus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }

    public function themes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
