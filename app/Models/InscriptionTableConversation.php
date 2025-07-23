<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscriptionTableConversation extends Model
{
    protected $fillable = [
        'tableconversation_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'inscription_message',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function tableconversation()
    {
        return $this->belongsTo(TableConversation::class, 'tableconversation_id');
    }


}
