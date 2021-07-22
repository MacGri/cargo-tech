<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Repositories;

use App\Models\Counter;

class CounterRepository
{
    public function incrementCount(string $table): bool|int
    {
        $searchAttributes = [
            'table' => $table,
        ];

        return Counter::query()->updateOrCreate($searchAttributes)->increment('count');
    }

    public function decrementCount(string $table): int
    {
        return Counter::query()->where('table', $table)->decrement('count');
    }
}
