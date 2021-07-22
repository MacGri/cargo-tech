<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\Cargotech\Dto\CargoEntity;

class StoreCargoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'weight'                 => 'required|int',
            'volume'                 => 'required|int',
            'truck'                  => 'required|array',
            'truck.quantity'         => 'required|int',
            'truck.belt_count'       => 'required|int',
            'truck.place_count'      => 'required|int',
            'truck.pallet_count'     => 'required|int',
            'truck.tir'              => 'required|bool',
            'truck.temp_from'        => 'nullable',
            'truck.temp_to'          => 'nullable',
            'truck.temperature_from' => 'nullable',
            'truck.temperature_to'   => 'nullable',
            'truck.adr'              => 'required|int',
            'truck.height'           => 'required|int',
            'truck.length'           => 'required|int',
            'truck.width'            => 'required|int',
        ];
    }

    public function getFilter(): CargoEntity
    {
        return CargoEntity::make($this->validated());
    }
}
