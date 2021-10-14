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
});
