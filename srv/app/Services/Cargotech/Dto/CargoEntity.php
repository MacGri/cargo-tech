<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Dto;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class CargoEntity implements JsonSerializable, Arrayable
{
    private mixed $id;
    private mixed $weight;
    private mixed $volume;
    private mixed $truck;

    public static function make(array $data): self
    {
        $item = new static();

        $item->id     = $data['id'] ?? null;
        $item->weight = $data['weight'] ?? null;
        $item->volume = $data['volume'] ?? null;
        $item->truck  = (array)$data['truck'] ?? null;

        return $item;
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->id,
            'weight'     => $this->weight,
            'volume'     => $this->volume,
            'truck'      => $this->truck,
            'deleted_at' => null,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function getForSave(): array
    {
        return [
            'weight' => $this->weight,
            'volume' => $this->volume,
            'truck'  => $this->truck,
        ];
    }
}
