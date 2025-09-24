<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginUserRequest $request): JsonResponse {
       $request->validated($request->all());

       if (!Auth::attempt($request->only('email', 'password'))) {
           return $this->error('Invalid credentials', 401);
       }

         $user = User::firstWhere('email', $request->email);

         return $this->ok(
             'Authenticated',
             [

                 'token' => $user->createToken('API Token for' . $user->email,['*'],now()->addMonth())->plainTextToken
             ]
         );
    }

    public function logout(Request $request): JsonResponse {
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logged out');
    }

    public function register(Request $request): JsonResponse {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'in:etudiant,admin,enseignant',
            'is_active' => 'boolean'

        ]);


       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'etudiant',
            'is_active' => 0
        ]);

        return $this->ok('Register successful');
    }

    public function user(Request $request): JsonResponse {

        return response()->json([
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
//                'initials' => $request->user()->initials(),
//                'phone' => $request->user()->phone,
//                'company' => $request->user()->company,
//                'job_title' => $request->user()->job_title,
//                'country' => $request->user()->country,
//                'city' => $request->user()->city,
//                'socials' => $request->user()->socials,
            ],
        ]);

    }
}
