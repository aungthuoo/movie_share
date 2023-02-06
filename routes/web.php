<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\CommentController;
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

// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::get('register', [AuthenticatedSessionController::class, 'register'])
    ->name('register')
    ->middleware('guest');


Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::get('watch', [WatchController::class, 'index'])
    ->name('watch');

Route::get('/watch/{movie}', [WatchController::class, 'watch'])
    ->name('home');


// Dashboard
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Users

Route::get('users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('auth');

Route::get('users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('users', [UsersController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::get('users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');

Route::put('users/{user}', [UsersController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

Route::delete('users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth');

Route::put('users/{user}/restore', [UsersController::class, 'restore'])
    ->name('users.restore')
    ->middleware('auth');


Route::post('register', [UsersController::class, 'register'])
    ->name('users.register');





// Movies
Route::get('movies', [MovieController::class, 'index'])
    ->name('movies')
    ->middleware('auth');

Route::get('movies/create', [MovieController::class, 'create'])
    ->name('movies.create')
    ->middleware('auth');

Route::post('movies', [MovieController::class, 'store'])
    ->name('movies.store')
    ->middleware('auth');

Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])
    ->name('movies.edit')
    ->middleware('auth');

Route::put('movies/{movie}', [MovieController::class, 'update'])
    ->name('movies.update')
    ->middleware('auth');

Route::delete('movies/{movie}', [MovieController::class, 'destroy'])
    ->name('movies.destroy')
    ->middleware('auth');

Route::put('movies/{movie}/restore', [MovieController::class, 'restore'])
    ->name('movies.restore')
    ->middleware('auth');


// Comments 
Route::post('comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');



// Reports

Route::get('reports', [ReportsController::class, 'index'])
    ->name('reports')
    ->middleware('auth');

// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');
