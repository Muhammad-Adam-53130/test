<?php

use App\Http\Controllers\AIController;
use Illuminate\Support\Facades\Route;

Route::name('ai.')->prefix('ai')->group(function () {
    Route::get('/', [AIController::class, 'index'])->name('index');
    Route::get('/processRequest', [AIController::class, 'processRequest'])->name('processRequest');
    Route::get('/create', [AIController::class, 'create'])->name('create');
    Route::post('/store', [AIController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AIController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AIController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [AIController::class, 'destroy'])->name('destroy');
});