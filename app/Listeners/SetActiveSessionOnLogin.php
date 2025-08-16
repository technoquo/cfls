<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Str;

class SetActiveSessionOnLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Token único para esta sesión oficial
        $token = Str::uuid()->toString(); // o: bin2hex(random_bytes(16))

        // Guardarlo como "oficial" en BD
        $event->user->forceFill(['session_active_id' => $token])->saveQuietly();

        // Guardarlo en la sesión del navegador actual
        session(['session_active_id' => $token]);

        // Laravel ya regenera el ID de sesión tras login; no toques SESSION_DRIVER
    }
}
