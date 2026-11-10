<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vehicles' , [VehicleController::class, 'index'])->name('vehicles.index');
Route::post('/vehicles' , [VehicleController::class, 'store'])->name('vehicles.store');
Route::delete('/vehicles/{id}' , [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::put('/vehicles/{vehicles}', [VehicleController::class, 'update'])->name('vehicles.update');
