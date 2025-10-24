<?php

namespace App\Http\Controllers\Api\V1;



use App\Http\Resources\V1\VerifyCodeResource;
use App\Models\Syllabu;
use App\Models\User;
use App\Models\VerifyCode;

class VerifyCodeController
{
    public function index(User $user)
    {

        $verifyCodes = VerifyCode::where('user_id', $user->id)->get();

        return VerifyCodeResource::collection($verifyCodes);

    }
}