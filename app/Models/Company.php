<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            $company->users_id = Auth::id(); // Automatically set the logged-in user's ID
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
