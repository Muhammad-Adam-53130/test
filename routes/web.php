<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'log-request'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    require_once __DIR__ . '/web/user/web.php';

    require_once __DIR__ . '/web/feed/web.php';

    require_once __DIR__ . '/web/form/web.php';

    require_once __DIR__ . '/web/ai/web.php';

    require_once __DIR__ . '/web/about/web.php';
});
