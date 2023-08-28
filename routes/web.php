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

Route::get('/main_page', [App\Http\Controllers\main_page\MainController::class, 'show'])->name('home')->middleware('auth');

//роуты пользователей
Route::get('/user', [UserController::class, 'index'])->name('get.user');
Route::post('/user/update', [App\Http\Controllers\Profile\UserController::class, 'update'])->name('post.userUpdate');
Route::post('/user/update/password', [App\Http\Controllers\Profile\UserController::class, 'updatePassword'])->name('post.userPasswordUpdate');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

//роуты проектов
Route::get('/project', [App\Http\Controllers\Project\ProjectController::class, 'index'])->name('get.project');
Route::get('/projects', [App\Http\Controllers\Project\ProjectController::class, 'getProjects'])->name('get.projects');
Route::delete('/project/delete/', [App\Http\Controllers\Project\ProjectController::class, 'delete'])->name('delete.project');
Route::post('/leave-project', [App\Http\Controllers\Project\ProjectController::class, 'leaveProject'])->name('leaveProject');
Route::post('/join-project', [App\Http\Controllers\Project\ProjectController::class, 'joinProject'])->name('joinProject');

Route::post('/create-project', [App\Http\Controllers\Project\ProjectController::class, 'createProject'])->name('newProject');

Route::get('/project/create_invitation', [App\Http\Controllers\Project\ProjectController::class, 'createInvitationUrl'])->name('createInvitationUrl');
Route::get('/project/add_user_url/{id_user}/{id_project}', [App\Http\Controllers\Project\ProjectController::class, 'addUserInProjectUrl'])->name('addUserInProjectUrl');

//роуты участников проектов
Route::get('/participant', [App\Http\Controllers\Project\ParticipantController::class, 'index'])->name('get.participant');
Route::get('/participants', [App\Http\Controllers\Project\ParticipantController::class, 'getParticipants'])->name('get.participants');
Route::get('/participants/invited', [App\Http\Controllers\Project\ParticipantController::class, 'getParticipantsInvited'])->name('get.participantsInvited');
Route::post('/participant/add', [App\Http\Controllers\Project\ParticipantController::class, 'addParticipant'])->name('addParticipant');
Route::post('/participant/update', [App\Http\Controllers\Project\ParticipantController::class, 'update'])->name('post.participantUpdate');
Route::delete('/participant/delete', [App\Http\Controllers\Project\ParticipantController::class, 'delete'])->name('delete.participant');


//роуты ролей
Route::get('/roles', [App\Http\Controllers\Profile\RoleController::class, 'index'])->name('get.roles');

//роуты фильтров
Route::post('/main_page/{id}', [App\Http\Controllers\Profile\RoleController::class, 'index'])->name('filterByName');

