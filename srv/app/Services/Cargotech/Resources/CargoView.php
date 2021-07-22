<?php

declare(strict_types=1);

namespace App\Services\Cargotech\Resources;

use App\Models\Cargo;
use Illuminate\Http\Resources\Json\JsonResource;

class CargoView extends JsonResource
{
    public function toArray($request): array
    {
        /** @var $this Cargo */
        return [
            'id'     => $this->id,
            'weight' => $this->weight,
            'volume' => $this->volume,
            'truck'  => $this->truck,
        ];
    }
}
