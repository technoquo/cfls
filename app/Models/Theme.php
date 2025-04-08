<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    public function syllabus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }

    public function videos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VideoTheme::class, 'theme_id');
    }
}
