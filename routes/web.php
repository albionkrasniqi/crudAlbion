<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/books', [BooksController::class, 'index']);

Route::post('/books/create', [BooksController::class, 'store'])->name('books.create');

Route::get('/books/all', [BooksController::class, 'seeBooks'])->name('books.see');

Route::get('/books/edit/{id}', [BooksController::class, 'editForm'])->name('books.edit');

Route::put('/books/update/{id}', [BooksController::class, 'updateBooks'])->name('books.update');

Route::put('/books/delete/{id}', [BooksController::class, 'destroy'])->name('books.delete');