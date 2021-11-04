<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/topic/{topic}', [Controllers\TopicController::class, 'show'])->name('topic.details');

Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.details');

Route::get('/user/{user}', [Controllers\UserController::class, 'show'])->name('user.details');


Route::middleware(['guest'])->group(function () {
    Route::get('/sign-up', [Controllers\Auth\RegisterController::class, 'create'])->name('auth.register');
    Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/sing-in', [Controllers\Auth\SessionController::class, 'create'])->name('auth.login');
    Route::post('/sing-in', [Controllers\Auth\SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');

    Route::get('/publish', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/publish', [Controllers\PostController::class, 'store']);

    Route::get('/post/{post}/edit', [Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/edit', [Controllers\PostController::class, 'update']);

    Route::post('/post/{post}/comment', [Controllers\PostController::class, 'comment'])->name('post.comment');

    Route::post('/post/{post}/image', [Controllers\PostController::class, 'uploadImage'])->name('post.image');

    Route::post('/comment/{comment}/reply', [Controllers\CommentController::class, 'reply'])->name('comment.reply');
});
