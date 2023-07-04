<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/register', [App\Http\Controllers\RegisterController::class, 'show'])->middleware('guest')->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->middleware('guest');

// upload profile avatar
Route::get('/profile/upload', [App\Http\Controllers\ProfileController::class, 'uploadView'])->middleware('auth');
Route::post('/profile/upload', [App\Http\Controllers\ProfileController::class, 'upload'])->middleware('auth');


use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');









