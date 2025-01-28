<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::name('tag.')->prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/store', [TagController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TagController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TagController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [TagController::class, 'destroy'])->name('destroy');
});