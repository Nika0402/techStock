<?php


use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InterventionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('devices.index');
});

Route::resource('devices', DeviceController::class);

Route::resource('rooms', RoomController::class)->only(['index', 'create', 'store', 'show']);

Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store']);

Route::get('/categories/{category}/devices', [CategoryController::class, 'devices'])
->name('categories.devices');

Route::post('/interventions', [InterventionController::class, 'store'])->name('interventions.store');