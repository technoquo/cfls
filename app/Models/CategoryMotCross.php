<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMotCross extends Model
{
    public function words()
    {
        return $this->hasMany(WordCross::class, 'category_mot_crosses_id');
    }
}
