<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;


Route::get('/create', [PersonController::class, 'create'])->name('people.create');
Route::get('/', [PersonController::class, 'index'])->name('people.index');
Route::get('/{id}', [PersonController::class, 'show'])->name('people.show');
Route::post('/', [PersonController::class, 'store'])->name('people.store');





