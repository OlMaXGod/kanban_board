<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authorization\InterfaceController;
use App\Http\Controllers\authorization\AuthorizationController;
use App\Http\Controllers\Main_page;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', [InterfaceController::class, 'show'])->name('loginInterface');

Auth::routes();

Route::get('/main_page/{id}', [App\Http\Controllers\main_page\MainController::class, 'show'])->name('home')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('get.user');
Route::post('/users/edit', [UserController::class, 'edit'])->name('post.userEdit');
Route::post('/users/edit/password', [UserController::class, 'editPassword'])->name('post.userEditPassword');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');