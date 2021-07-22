<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Listeners;

use App\Services\Cargotech\Events\CargoCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Cargotech\Notifications\CargoCreateNotify;

class MailListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(CargoCreatedEvent $event)
    {
        $event->cargo->notify(new CargoCreateNotify());
    }
}
