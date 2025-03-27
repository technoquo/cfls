<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    public function videos(): HasMany
    {
        return $this->hasMany(Vimeo::class, 'categories_id');
    }


    public function users(): BelongsTo
     {
        return $this->belongsTo(User::class);
     }
}
