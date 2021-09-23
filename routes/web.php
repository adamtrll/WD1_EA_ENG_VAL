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


Route::get('/sign-up', [Controllers\Auth\RegisterController::class, 'create'])->name('auth.register');
Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store']);
