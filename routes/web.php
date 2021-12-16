<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
    return view('post', [ 'post' => Post::find($slug) ]);
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for yur application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');
Route::get('register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');;

Route::get('login', [SessionController::class, 'index'])->middleware('guest');
Route::post('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');