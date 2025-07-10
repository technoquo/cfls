<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function calendar(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Calendar::class);
    }

    public function formations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Formations::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(InscriptionFormation::class);
    }
}
