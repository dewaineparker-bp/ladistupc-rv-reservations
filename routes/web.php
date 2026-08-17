<?php

use App\Http\Controllers\Rv\ReservationController;
use App\Http\Controllers\Rv\SetupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReservationController::class, 'index'])->name('rv.home');
Route::get('/availability', [ReservationController::class, 'availability'])->name('rv.availability');

Route::get('/setup', [SetupController::class, 'index'])->name('rv.setup');
Route::post('/setup', [SetupController::class, 'run'])->name('rv.setup.run');
