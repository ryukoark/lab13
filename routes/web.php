<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\LibroController;

Route::get('/', [LibroController::class, 'index'])->name('welcome');
// routes/web.php
use App\Http\Controllers\ReservaController;

Route::get('/dashboard', [ReservaController::class, 'index'])->name('dashboard');
Route::post('/reservar/{codigo_libro}', [ReservaController::class, 'reservar'])->name('reservar');

require __DIR__.'/auth.php';
