<?php

use App\Http\Controllers\ActividadFisicaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitoController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('habitos', HabitoController::class);

    Route::post('/habitos/{habito}/completar', [HabitoController::class, 'completar'])
        ->name('habitos.completar');

});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::resource('actividades', ActividadFisicaController::class)
    ->middleware(['auth']);

Route::resource('lecturas', LecturaController::class)
    ->middleware(['auth']);
