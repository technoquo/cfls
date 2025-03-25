<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoFormation extends Model
{
    public function formations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Formations::class);
    }
}
