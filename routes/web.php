<?php

use Illuminate\Support\Facades\Route;

Route::prefix('shared-features')->group(function () {
    Route::get('/', function () {
        return view('shared-features::index');
    });
});
