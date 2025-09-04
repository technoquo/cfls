<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Http\Responses\RegisterResponse as CustomRegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // === Registraciones estándar de Fortify / Jetstream ===
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // === 🔒 Bloquear segundo inicio de sesión ===
        Fortify::authenticateUsing(function (Request $request) {
            $usernameField = Fortify::username(); // 'email' por defecto

            $user = User::where($usernameField, $request->input($usernameField))->first();

            // Credenciales inválidas => devolver null para error estándar
            if (! $user || ! Hash::check($request->input('password'), $user->password)) {
                return null;
            }

            // Si YA hay una sesión activa registrada, bloquear este login
//            if (filled($user->session_active_id)) {
//                throw ValidationException::withMessages([
//                    $usernameField => __('Une session est déjà active sur un autre navigateur/appareil. Fermez cette session et réessayez.'),
//                ]);
//            }

            // OK: Fortify continuará y disparará el evento Login
            return $user;
        });

        // === Rate limiters ===
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $this->app->singleton(RegisterResponseContract::class, function ($app) {
            return new CustomRegisterResponse();
        });
    }
}
