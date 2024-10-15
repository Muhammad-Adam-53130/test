<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', function () {
        return view('user');
    })->name('user');

    Route::name('food')->group(function(){
        Route::get('/details', function(){
            return 'Food details are following';
        });

        Route::get('/home', function(){
            return 'Food home page';
        });
    });

    Route::name('job')->prefix('job')->group(function(){
        Route::get('home', function(){
            return 'job home page';
        })->name('.home');

        Route::get('details', function(){
            return 'Job details are following';
        })->name('.descriptions');
    });
});
