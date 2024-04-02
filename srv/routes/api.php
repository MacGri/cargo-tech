<?php

use App\Services\Cargotech\Controllers\CargoController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/', [CargoController::class, 'index'])->name('cargo.index');
    Route::get('/{cargo}', [CargoController::class, 'show'])->name('cargo.show');
    Route::post('/', [CargoController::class, 'store']);
    Route::put('/{cargo}', [CargoController::class, 'update']);
});
