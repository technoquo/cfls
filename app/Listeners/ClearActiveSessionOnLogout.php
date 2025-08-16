<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class ClearActiveSessionOnLogout
{
    public function handle(Logout $event): void
    {
        if ($event->user) {
            // No dependas de la sesión; limpia siempre el flag en BD
            $event->user->forceFill(['session_active_id' => null])->saveQuietly();
        }

        session()->forget('session_active_id');
    }
}
