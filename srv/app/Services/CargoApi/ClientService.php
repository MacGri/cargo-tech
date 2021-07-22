<?php
declare(strict_types=1);

namespace App\Services\CargoApi;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ClientService
{
    private string $baseUrl;
    private int    $timeout;
    private int    $connectTimeout;

    public function __construct()
    {
        $this->baseUrl        = config('services.cargo.url');
        $this->timeout        = config('services.cargo.timeout');
        $this->connectTimeout = config('services.cargo.connect_timeout');
    }

    public function fetch(string $url, array $data = []): Response
    {
        return Http::withHeaders([
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
        ])->withOptions([
            'timeout'         => $this->timeout,
            'connect_timeout' => $this->connectTimeout,
        ])->get($this->baseUrl . '/' . trim($url, '/'), $data);
    }
}
