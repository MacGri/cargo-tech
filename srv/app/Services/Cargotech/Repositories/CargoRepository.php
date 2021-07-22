<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Repositories;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Collection;

class CargoRepository
{
    public function updateOrCreate(array $item)
    {
        $searchAttributes = [
            'id' => $item['id'],
        ];

        return Cargo::query()->withTrashed()->updateOrCreate($searchAttributes, $item);
    }

    public function create(array $data): Cargo
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::query()->create($data);

        return $cargo;
    }

    public function update(Cargo $cargo, array $data): Cargo
    {
        $cargo->update($data);
        $cargo->refresh();

        return $cargo;
    }

    public function findWithPaginator(array $filter): Collection|array
    {
        $cargo = Cargo::query();
        if(isset($filter['truck_key']) && isset($filter['truck_item'])){
            $cargo->whereRaw("truck ->> '{$filter['truck_key']}' = '{$filter['truck_item']}'");
        }

        if(isset($filter['belt_count_from'])){
            $cargo->whereRaw("truck -> 'belt_count' > '{$filter['belt_count_from']}'");
        }

        if(isset($filter['belt_count_to'])){
            $cargo->whereRaw("truck -> 'belt_count' < '{$filter['belt_count_to']}'");
        }

        return $cargo
            ->limit($filter['limit'])
            ->offset($filter['offset'])
            ->orderByDesc('id')
            ->get();
    }
}
