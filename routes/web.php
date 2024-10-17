<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/panel', function () {
        return view('panel');
    })->name('panel');


    Route::get('/reservas', [ReservaController::class, 'index']
    )->name('reservas.index');

    Route::get('/reservas-crear', [ReservaController::class, 'crear']
    )->name('reservas.crear');

    Route::post('/reservas', [ReservaController::class, 'store']
    )->name('reservas.store');

});
