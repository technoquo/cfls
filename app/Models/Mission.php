<?php

namespace App\Models;

use App\Models\Objective;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    

    public function objectives(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Objective::class);
    }
}
