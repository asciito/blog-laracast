<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
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
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [SessionController::class, 'index']);
    Route::post('login', [SessionController::class, 'create']);
});

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::resource('admin/posts', AdminPostController::class)->except('show')->middleware('can:admin');
