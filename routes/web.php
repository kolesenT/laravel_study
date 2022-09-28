<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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

        Route::group(['prefix' => '/{movie}/', 'middleware' => 'can:update,movie'],
            function () {
                Route::get('edit', [MovieController::class, 'editForm'])
                    ->name('movies.edit.form');

                Route::post('edit', [MovieController::class, 'edit'])
                    ->name('movies.edit');
            });

        Route::post('/{movie}/delete', [MovieController::class, 'delete'])
            ->name('movies.delete')->middleware('can:delete,movie');
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

Route::group(['prefix' => '/genres', 'middleware' => 'auth'],
    function () {
        Route::get('', [GenreController::class, 'list'])
            ->name('genres');

        Route::get('/create', [GenreController::class, 'createForm'])
            ->name('genres.createForm');

        Route::post('/create', [GenreController::class, 'create'])
            ->name('genres.create');

        Route::get('/{genre}', [GenreController::class, 'show'])
            ->name('genres.show');

        Route::get('/{genre}/edit', [GenreController::class, 'editForm'])
            ->name('genres.edit.form');

        Route::post('/{genre}/edit', [GenreController::class, 'edit'])
            ->name('genres.edit');

        Route::post('/{genre}/delete', [GenreController::class, 'delete'])
            ->name('genres.delete');
    }
);

Route::group(['prefix' => '/actors', 'middleware' => 'auth'],
    function () {
        Route::get('', [ActorController::class, 'list'])
            ->name('actors');

        Route::get('/create', [ActorController::class, 'createForm'])
            ->name('actors.createForm');

        Route::post('/create', [ActorController::class, 'create'])
            ->name('actors.create');

        Route::get('/{actor}', [ActorController::class, 'show'])
            ->name('actors.show');

        Route::get('/{actor}/edit', [ActorController::class, 'editForm'])
            ->name('actors.edit.form');

        Route::post('/{actor}/edit', [ActorController::class, 'edit'])
            ->name('actors.edit');

        Route::post('/{actor}/delete', [ActorController::class, 'delete'])
            ->name('actors.delete');
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
