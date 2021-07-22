<?php
declare(strict_types=1);

namespace App\Services\CargoApi\UseCases;

use App\Dictionaries\ApiCargos\SearchTypeDict;
use App\Services\CargoApi\Repositories\ApiRepository;
use Illuminate\Support\Collection;

class IndexCargosCase
{
    const  MAX_LIMIT = 100;

    private ApiRepository $apiRepo;
    private array         $response = [];
    private int           $metaSize = 0;

    public function __construct(ApiRepository $apiRepo)
    {
        $this->apiRepo = $apiRepo;
    }

    public function handle(int $count = null, string $type = null): Collection
    {
        $this->getMeta();

        if (empty($this->metaSize)) {
            return collect();
        }

        if (empty($count) && empty($type)) {
            $this->getItems($this->metaSize);
        }

        if ($type == SearchTypeDict::ITEMS && isset($count)) {
            $this->getItems($count);
        }

        if ($type == SearchTypeDict::PAGES && isset($count)) {
            $this->getPages($count);
        }

        return collect($this->response);
    }

    private function getItems(int $count): void
    {
        $allData = [];
        $offset  = 0;

        do {
            $limit = $count > self::MAX_LIMIT
                ? self::MAX_LIMIT
                : $count;

            $data    = $this->getResponseData($limit, $offset);
            $allData = array_merge($allData, $data);

            $count  = $count - self::MAX_LIMIT;
            $offset = $offset + self::MAX_LIMIT;

        } while ($count > 0 && count($data));

        $this->response = $allData;
    }


    private function getPages(int $pages)
    {
        $allData = [];
        $offset  = 0;
        $page    = 1;

        do {
            $data    = $this->getResponseData(self::MAX_LIMIT, $offset);
            $allData = array_merge($allData, $data);

            $offset = $offset + self::MAX_LIMIT;
            $page   = $page + 1;
        } while ($page <= $pages && count($data));

        $this->response = $allData;
    }


    public function getResponseData(?int $limit, int $offset): array
    {
        $response = $this->apiRepo->find($limit, $offset);
        if ($response->status() !== 200) {
            return [];
        }

        return $response->json()['data'];
    }

    private function getMeta()
    {
        $response = $this->apiRepo->find(0, 0);

        if ($response->status() !== 200) {
            $this->metaSize = 0;

            return;
        }

        $this->metaSize = data_get($response->json(), 'meta.size', 0);
    }
}
