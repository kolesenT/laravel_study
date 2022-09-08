<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
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

Route::get('/movies', [MovieController::class, 'list'])
    ->name('movies');

Route::get('/movies/create', [MovieController::class, 'createForm'])
    ->name('movies.createForm');

Route::post('/movies/create', [MovieController::class, 'create'])
    ->name('movies.create');

Route::get('/movies/{movie}', [MovieController::class, 'show'])
    ->name('movies.show');

Route::get('/movies/{movie}/edit', [MovieController::class, 'editForm'])
    ->name('movies.edit.form');

Route::post('/movies/{movie}/edit', [MovieController::class, 'edit'])
    ->name('movies.edit');

Route::post('/movies/{movie}/delete', [MovieController::class, 'delete'])
    ->name('movies.delete');

Route::get('/contact', [ContactController::class, 'show'])
    ->name('contact');

Route::post('/contact/submit', [ContactController::class, 'store'])
    ->name('contact.store');
