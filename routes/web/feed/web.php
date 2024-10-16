<?php

use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;

Route::name('feed.')->prefix('feed')->group(function () {
    Route::get('/', [FeedController::class, 'index'])->name('index');
    Route::get('/create', [FeedController::class, 'create'])->name('create');
    Route::post('/store', [FeedController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FeedController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [FeedController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [FeedController::class, 'destroy'])->name('destroy');
});