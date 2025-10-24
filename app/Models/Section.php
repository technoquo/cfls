<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name','type', 'name_syllabu', 'active'];
    public $timestamps = true;

    public function syllabus()
    {
        return $this->belongsTo(Syllabu::class, 'syllabu_id');
    }
}
