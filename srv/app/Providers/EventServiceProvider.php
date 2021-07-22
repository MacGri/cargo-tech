<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Services\Cargotech\Events\CargoCreatedEvent;
use App\Services\Cargotech\Events\CargoUpdatedEvent;
use App\Services\Cargotech\Listeners\CargoDeleteListener;
use App\Services\Cargotech\Listeners\MailListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CargoCreatedEvent::class => [
            MailListener::class
        ],
        CargoUpdatedEvent::class => [
            CargoDeleteListener::class
        ],
    ];

    public function boot()
    {
        //
    }
}
