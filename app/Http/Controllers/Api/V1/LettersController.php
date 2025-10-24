<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\LetterResource;
use App\Models\Letter;

class LettersController
{

    public function index()
    {
        $letters = Letter::all();


        return  LetterResource::collection($letters);

    }
}