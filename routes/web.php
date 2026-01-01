<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/books', [BookController::class, 'index'])->name('book.list');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('book.delete');
