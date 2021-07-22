<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Repositories;

use App\Models\Cargo;

class CargoRepository
{
    public function updateOrCreate(array $item)
    {
        $searchAttributes = [
            'id' => $item['id'],
        ];

        return Cargo::query()->withTrashed()->updateOrCreate($searchAttributes, $item);
    }
}
