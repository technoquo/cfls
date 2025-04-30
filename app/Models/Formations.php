<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{

    public function info_formation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InfoFormation::class);
    }

    public function calendar(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Calendar::class, 'formation_id');
    }


}
