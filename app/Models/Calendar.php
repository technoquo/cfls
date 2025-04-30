<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Calendar extends Model
{
    protected static function booted()
    {
        static::saving(function ($calendar) {
            // Load related models (if not already loaded)
            $calendar->loadMissing(['formation', 'levels']);

            $formationTitle = $calendar->formation?->title ?? '';
            $levelName = $calendar->levels?->name ?? '';

            $calendar->slug = Str::slug("{$formationTitle} {$levelName}");
        });
    }

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formations::class);
    }
    public function levels(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}
