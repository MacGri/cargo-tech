<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Jobs;

use App\Models\Cargo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Cargotech\Dto\CargoEntity;
use App\Services\Cargotech\Events\CargoCreatedEvent;
use App\Services\Cargotech\Events\CargoUpdatedEvent;
use App\Services\Cargotech\Repositories\CargoRepository;

class SyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CargoEntity $item;

    public function __construct(CargoEntity $item)
    {
        $this->item = $item;
    }

    public function handle(CargoRepository $cargoRepo)
    {
        /** @var Cargo $cargo */
        $cargo = $cargoRepo->updateOrCreate($this->item->toArray());

        if ($cargo->wasChanged()) {
            CargoUpdatedEvent::dispatch($cargo);
        } else {
            CargoCreatedEvent::dispatch($cargo);
        }
    }
}
