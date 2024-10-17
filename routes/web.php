<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Users;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mesas', function () {
    return view('mesas');
});

Route::get('/panel', function () {
    return view('panel');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/users', Users::class);
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



