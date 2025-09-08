<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(ApiLoginRequest $request) {
        return $this->ok($request->get('email'));
       // return response()->json(['message' => 'Login successful'],200);
    }

    public function register() {
        return $this->ok('Register successful');
    }
}
