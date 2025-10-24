<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    protected $fillable = ['name', 'image_path','syllabus_id','theme_id','active'];

    public $timestamps = true;


    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }


    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }
}
