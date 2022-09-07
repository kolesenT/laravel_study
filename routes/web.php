<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
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

Route::get('/contact', [ContactController::class, 'show'])
    ->name('contact');

Route::post('/contact/submit', [ContactController::class, 'store'])
    ->name('contact.store');
