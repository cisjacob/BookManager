<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/books', [BookController::class, 'index']);
// Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

//GUEST AND AUTH

Route::middleware('guest')->group(function(){
    Route::get('/sign-up', [SignupController::class, 'index'])->name('sign-up.index');
    Route::post('/sign-up', [SignupController::class, 'signUp'])->name('sign-up');
    Route::get('/sign-in', [SigninController::class, 'index'])->name('sign-in.index');
    Route::post('/sign-in', [SigninController::class, 'signIn'])->name('sign-in');
});

Route::middleware('auth')->group(function(){
    Route::post('/sign-out', [SignoutController::class, 'signOut'])->name('sign-out');
    Route::resource('books', BookController::class);
});





