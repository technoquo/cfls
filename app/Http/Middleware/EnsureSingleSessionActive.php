<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSingleSessionActive
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user          = Auth::user();
            $currentToken  = $request->session()->get('session_active_id'); // token de esta sesión
            $officialToken = $user->session_active_id;                       // token oficial en BD

            // Si no existe o no coincide, expulsamos
            if (empty($currentToken) || empty($officialToken) || $currentToken !== $officialToken) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return $request->expectsJson()
                    ? response()->json(['message' => 'Votre compte est connecté sur un autre navigateur/appareil.'], 401)
                    : redirect()->route('login')->withErrors([
                        'email' => 'Votre compte est connecté sur un autre navigateur/appareil.',
                    ]);
            }
        }

        return $next($request);
    }
}
