<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class,'home']);
Route::get('/items', [ItemController::class,'index']);
Route::get('/report', [ItemController::class,'create']);
Route::post('/report', [ItemController::class,'store']);

Route::middleware('auth')->group(function () {

    Route::get('/items/{id}', [ItemController::class,'show']);
    Route::get('/items/{id}/edit', [ItemController::class,'edit']);
    Route::put('/items/{id}', [ItemController::class,'update']);
    Route::delete('/items/{id}', [ItemController::class,'destroy']);
});

Route::get('/profile', function () {
    return view('profile.index');
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/items/{id}', function ($id) {
    $item = Item::with('user')->findOrFail($id);
    return view('items.item-detail', compact('item'));
})->middleware('auth');

require __DIR__.'/auth.php';