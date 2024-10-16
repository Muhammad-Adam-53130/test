<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/form/{name?}', function(Request $request, $name = null) {
    $name = $request->query('name', $name ?? 'no data');
    return view('form', ['name' => $name]);
})->name('form');