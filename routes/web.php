<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('landing');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
