<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableConversation extends Model
{


    public function formation()
    {
        return $this->belongsTo(Formations::class, 'formations_id');
    }
}
