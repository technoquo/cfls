<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InscriptionFormation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'formations_id',
        'levels_id',
    ];

    // Relación con la formación
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formations::class, 'formations_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    // Related to Level
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'levels_id');
    }

    // Related to Calendar
    public function calendar(): BelongsTo
    {
        return $this->BelongsTo(\App\Models\Calendar::class);
    }
}
