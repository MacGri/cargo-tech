<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Events;

use App\Models\Cargo;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CargoUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, Queueable, SerializesModels;

    public Cargo $cargo;

    public function __construct(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }
}
