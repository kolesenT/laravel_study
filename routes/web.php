<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Models\Movie;
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

Route::get('/', [MainController::class, 'index'])
    ->name('home');

Route::get('/about', [MainController::class, 'aboutUs'])
    ->name('home.about');

Route::group(
    ['prefix' => '/movies', 'middleware' => 'auth'],
    function () {
        Route::get('', [MovieController::class, 'list'])
            ->name('movies');

        Route::get('/create', [MovieController::class, 'createForm'])
            ->name('movies.createForm');

        Route::post('/create', [MovieController::class, 'create'])
            ->name('movies.create');

        Route::get('/{movie}', [MovieController::class, 'show'])
            ->name('movies.show');

        Route::get('/{movie}/edit', [MovieController::class, 'editForm'])
            ->name('movies.edit.form');

        Route::post('/{movie}/edit', [MovieController::class, 'edit'])
            ->name('movies.edit');

        Route::post('/{movie}/delete', [MovieController::class, 'delete'])
            ->name('movies.delete');
    }
);

Route::group(
    ['prefix' => '/contact'],
    function () {
        Route::get('', [ContactController::class, 'show'])
            ->name('contact');

        Route::post('/submit', [ContactController::class, 'store'])
            ->name('contact.store');
    }
);

Route::group(
    ['prefix' => '/sing-up'],
    function () {
        Route::get('', [UserController::class, 'singUpForm'])
            ->name('sing-up.Form');

        Route::post('', [UserController::class, 'singUp'])
            ->name('sing-up');
    }
);

Route::get('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
    ->name('verify.email');

Route::get('/login', [LoginController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'loginIn'])
    ->name('login-in');


Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
