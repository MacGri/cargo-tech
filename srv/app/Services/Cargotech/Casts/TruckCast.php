<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Services\Cargotech\Dto\TruckDto;

class TruckCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        $data = json_decode($value, true);

        return TruckDto::fromArray($data);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        /** @var $value TruckDto */
        return $value->dbSerialize();
    }
}
