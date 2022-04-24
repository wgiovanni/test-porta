<?php

use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});
// LOGIN
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginForm');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

// REGISTER
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('registerForm');
// LOGOUT
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
