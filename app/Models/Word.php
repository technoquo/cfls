<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Word extends Model
{
    protected $fillable = ['name', 'video_theme_cloudinary_id', 'syllabu_id', 'theme_id', 'active'];


    public function videoThemeCloudinary(): BelongsTo
    {
        return $this->belongsTo(VideoTheme::class);
    }
}
