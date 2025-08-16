<?php
// app/Providers/EventServiceProvider.php
namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            \App\Listeners\SetActiveSessionOnLogin::class,
        ],
        Logout::class => [
            \App\Listeners\ClearActiveSessionOnLogout::class,
        ],
    ];
}
