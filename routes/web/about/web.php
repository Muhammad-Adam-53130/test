<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function() {
    return view('pages.about');
})->name('about');