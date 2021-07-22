<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Listeners;

use App\Services\Cargotech\Events\CargoUpdatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Cargotech\Repositories\CargoRepository;

class CargoDeleteListener implements ShouldQueue
{
    use InteractsWithQueue;

    public $delay = 300;

    public function __construct(CargoRepository $cargoRepo)
    {
        //
    }

    public function handle(CargoUpdatedEvent $event)
    {
        $event->cargo->delete();
    }
}
