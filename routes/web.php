<?php

use App\Http\Controllers\EdomPublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edom/{edom}/isi', [EdomPublicController::class, 'show'])->name('edom.fill');
Route::post('/edom/{edom}/isi', [EdomPublicController::class, 'submit'])->name('edom.submit');
