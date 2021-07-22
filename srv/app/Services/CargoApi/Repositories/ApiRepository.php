<?php
declare(strict_types=1);

namespace App\Services\CargoApi\Repositories;

use Illuminate\Http\Client\Response;
use App\Services\CargoApi\ClientService;

class ApiRepository
{
    private ClientService $client;

    public function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    public function find(int $limit, int $offset): Response
    {
        $data = [
            'limit'  => $limit,
            'offset' => $offset,
        ];

        return $this->client->fetch('cargos', array_filter($data));
    }
}
