<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\MesaComponent;

Route::get('/mesas', MesaComponent::class)->name('mesas.index');
use App\Livewire\Usuarios;

 Route::get('/', function () {
     return view('welcome');
});

Route::get('/panel', function () {
    return view('panel');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/feedback-cliente', function () {
    return view('feedback-cliente');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('panel');
    })->name('dashboard');
});
