<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CurriculoController;

Route::get('/', [CurriculoController::class, 'index'])->name('curriculo.form');

Route::post('/', [CurriculoController::class, 'store'])->name('curriculo.store');