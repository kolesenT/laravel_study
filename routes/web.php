<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
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

Route::get('/contact', [ReportController::class, 'show'])
    ->name('report');

Route::post('/contact/submit', [ReportController::class, 'store'])
    ->name('report.store');
