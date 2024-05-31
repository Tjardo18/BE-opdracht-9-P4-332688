<?php

use App\Http\Controllers\LeverancierDetailsController;
use App\Http\Controllers\LeveringController;
use App\Http\Controllers\OverzichtAllergeenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OverzichtController;
use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\OverzichtLeverancierController;
use App\Http\Controllers\NieuweLeveringController;
use App\Models\ProductPerLeverancier;
use PhpParser\Node\Expr\FuncCall;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overzicht', [OverzichtController::class, 'index',])->name('overzicht.index');

Route::get('/allergie/{id}', [AllergeenController::class, 'index',])->name('allergie.index');

Route::get('/leverancier/{id}', [LeverancierController::class, 'index'])->name('leverancier.index');

Route::get('/leverancier-overzicht', [OverzichtLeverancierController::class, 'index',])->name('leverancier-overzicht.index');

Route::get('/leveringen/{id}', [LeveringController::class, 'index',])->name('leveringen.index');

Route::get('/nieuwe-levering/{id}', [NieuweLeveringController::class, 'index',])->name('nieuwe-leveringen.index');

Route::post('/nieuwe-levering', [NieuweLeveringController::class, 'store'])->name('nieuwe-leveringen.store');

Route::get('/leverancier-details/{id}', [LeverancierDetailsController::class, 'index',])->name('leverancier-details.index');

Route::post('/leverancier-details', [LeverancierDetailsController::class, 'store'])->name('leverancier-details.store');

Route::get('/allergeen-overzicht', [OverzichtAllergeenController::class, 'index',])->name('allergeen-overzicht.index');

Route::get('/allergeen-overzicht/filter', [OverzichtAllergeenController::class, 'filterByAllergie'])->name('allergeen-overzicht.filterByAllergie');
