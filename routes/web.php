<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KueController;

Route::get('/', function () {
    return redirect('/kue');
});

Route::resource('kue', KueController::class);