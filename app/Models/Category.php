<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    public function videos(): BelongsTo
    {
        return $this->belongsTo(Vimeo::class);
    }


    public function users(): BelongsTo
     {
        return $this->belongsTo(User::class);
     }
}
