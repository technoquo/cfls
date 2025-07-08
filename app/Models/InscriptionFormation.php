<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
