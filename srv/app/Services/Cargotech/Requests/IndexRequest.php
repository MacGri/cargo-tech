<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'limit'  => $this->limit ?? 100,
            'offset' => $this->offset ?? 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'limit'           => 'sometimes|int|min:1|max:100',
            'offset'          => 'sometimes|int|min:0',
            'truck_key'       => 'required_with:truck_item|string',
            'truck_item'      => 'required_with:truck_key|string',
            'belt_count_from' => 'sometimes|int',
            'belt_count_to'   => 'sometimes|int',
        ];
    }

    public function getFilter(): array
    {
        return $this->validated();
    }
}
