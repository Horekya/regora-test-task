<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::controller(PatientController::class)->group(
    function () {
        Route::get('/', 'index')->name('index');

        Route::post('/', 'create');
    }
);
