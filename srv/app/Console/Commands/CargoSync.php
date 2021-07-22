<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CargoApi\UseCases\IndexCargosCase;
use App\Services\Cargotech\Dto\CargoEntity;
use App\Services\Cargotech\Jobs\SyncJob;

class CargoSync extends Command
{
    protected $signature = 'cargo:sync {--count=} {--type=}';

    protected $description = 'Синхронизация грузов с api.cargo.tech';

    /**
     * type может быть поштучно (items) или страницами (pages)
     * count количество записей или страниц в зависимости от типа
     */
    public function handle(IndexCargosCase $cargosCase)
    {
        $count = (int) $this->option('count');
        $type  = (string) $this->option('type');

        $data = $cargosCase->handle($count, $type);

        foreach ($data as $item) {
            $item = CargoEntity::make($item);

            SyncJob::dispatch($item);
        }
    }
}
