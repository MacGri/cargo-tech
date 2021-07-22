<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Controllers;

use App\Models\Cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Services\Cargotech\Repositories\CargoRepository;
use App\Services\Cargotech\Requests\IndexRequest;
use App\Services\Cargotech\Requests\StoreCargoRequest;
use App\Services\Cargotech\Resources\CargoView;

class CargoController extends Controller
{
    private CargoRepository $cargoRepo;

    public function __construct(CargoRepository $cargoRepo)
    {
        $this->cargoRepo = $cargoRepo;
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $cargos = $this->cargoRepo->findWithPaginator($request->getFilter());

        return response()->json(CargoView::collection($cargos));
    }

    public function show(Cargo $cargo): JsonResponse
    {
        return response()->json(new CargoView($cargo));
    }

    public function store(StoreCargoRequest $request): JsonResponse
    {
        $cargo = $this->cargoRepo->create($request->getFilter()->getForSave());

        return response()->json(new CargoView($cargo));
    }

    public function update(Cargo $cargo, StoreCargoRequest $request): JsonResponse
    {
        $cargo = $this->cargoRepo->update($cargo, $request->getFilter()->getForSave());

        return response()->json(new CargoView($cargo));
    }
}
