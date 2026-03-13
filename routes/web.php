<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Book routes
Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::prefix('books')->name('books.')->group(function () {
    // Trash routes - must be before resource routes to avoid conflicts
    Route::get('/trashed', [BookController::class, 'trashed'])->name('trashed');
    Route::patch('/{id}/restore', [BookController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [BookController::class, 'forceDelete'])->name('forceDelete');
    
    // Resource routes
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{book}', [BookController::class, 'show'])->name('show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
});