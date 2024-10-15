<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('user');
    
    Route::get('/form/{name?}', function(Request $request, $name = null) {
        $name = $request->query('name', $name ?? 'no data');
        return view('form', ['name' => $name]);
    })->name('form');
    Route::get('/about', function() {
        return view('about');
    })->name('about');
});
