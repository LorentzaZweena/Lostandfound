<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class,'home']);
Route::get('/items', [ItemController::class,'index']);
Route::get('/report', [ItemController::class,'create']);
Route::post('/report', [ItemController::class,'store']);

Route::get('/items/{item}', [ItemController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::put('/items/{item}', [ItemController::class,'update']);
    Route::delete('/items/{item}', [ItemController::class,'destroy']);
});

Route::get('/profile', function () {
    return view('profile.index');
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

require __DIR__.'/auth.php';