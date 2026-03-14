<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/items', [ItemController::class, 'index']);
Route::get('/report', [ItemController::class, 'create']);
Route::post('/report', [ItemController::class, 'store']);
