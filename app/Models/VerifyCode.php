<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyCode extends Model
{
    protected $fillable = ['code', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
