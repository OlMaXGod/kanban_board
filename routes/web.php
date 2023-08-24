<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authorization\InterfaceController;
use App\Http\Controllers\authorization\AuthorizationController;
use App\Http\Controllers\Main_page;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Profile\UserController;
use App\Http\Controllers\Profile\RoleController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ParticipantController;
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
Route::post('/users/edit', [App\Http\Controllers\Profile\UserController::class, 'edit'])->name('post.userEdit');
Route::post('/users/edit/password', [App\Http\Controllers\Profile\UserController::class, 'editPassword'])->name('post.userEditPassword');

Route::get('/projects', [App\Http\Controllers\Project\ProjectController::class, 'index'])->name('get.projects');
Route::delete('/project/delete/', [App\Http\Controllers\Project\ProjectController::class, 'delete'])->name('delete.project');

Route::get('/participants', [App\Http\Controllers\Project\ParticipantController::class, 'index'])->name('get.participants');
Route::delete('/participant/delete', [App\Http\Controllers\Project\ParticipantController::class, 'delete'])->name('delete.participant');

Route::get('/roles', [App\Http\Controllers\Profile\RoleController::class, 'index'])->name('get.roles');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');