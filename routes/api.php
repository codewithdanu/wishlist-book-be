<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', [App\Http\Controllers\API\BookController::class, 'index']);
Route::get('/books/{id}', [App\Http\Controllers\API\BookController::class, 'show']);
Route::get('/genres', [App\Http\Controllers\API\GenreController::class, 'index']);
Route::get('/authors', [App\Http\Controllers\API\AuthorController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/wishlist-books', [App\Http\Controllers\API\WishlistBookController::class, 'index']);
    Route::post('/wishlist-books', [App\Http\Controllers\API\WishlistBookController::class, 'store']);
    Route::delete('/wishlist-books/{bookId}', [App\Http\Controllers\API\WishlistBookController::class, 'destroy']);
});
