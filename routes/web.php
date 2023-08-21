<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authorization\InterfaceController;
use App\Http\Controllers\Main_page;

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

Route::get('/', [InterfaceController::class, 'show']);

Auth::routes();

Route::get('/main_page/{id}', [App\Http\Controllers\main_page\MainController::class, 'show'])->name('home');

