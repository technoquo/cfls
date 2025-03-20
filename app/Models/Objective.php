<?php

namespace App\Models;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    
    public function missions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Mission::class);
    }
}
