<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'API Token for ' . $user->email,
                    ['*'],
                    now()->addMonth()
                )->plainTextToken,
                'user'  => $user, // 👈 aquí
            ]
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logged out');
    }

    public function register(Request $request): JsonResponse
    {


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

    public function user(Request $request): JsonResponse
    {
        return $this->ok(
            'User retrieved',
            $request->user()
        );
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $user = $request->user();



        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return $this->ok('Profile updated', $user);
    }

    public function updatePassword(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!password_verify($request->current_password, $user->password)) {
            return $this->error('Current password is incorrect', 422);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return $this->ok('Password updated');
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Reset link sent'])
            : response()->json(['message' => 'Unable to send reset link'], 500);
    }
}
