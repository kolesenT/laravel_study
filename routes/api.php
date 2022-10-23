<?php

use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\UserController;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/sign-up', [UserController::class, 'signUp']);
Route::post('/login', [LoginController::class, 'signIn']);

Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::get('/movies', [MovieController::class, 'list']);

Route::group(['prefix' => '/movies', 'middleware' => ['auth:api']], function () {
    Route::post('', [MovieController::class, 'create'])->middleware('can:create,'.Movie::class);
    Route::put('/{movie}', [MovieController::class, 'edit'])->middleware('can:update,movie');
    Route::delete('/{movie}', [MovieController::class, 'delete'])->middleware('can:delete,movie');
});

Route::get('/genres/{genre}', [GenreController::class, 'show']);
Route::get('/genres', [GenreController::class, 'list']);

Route::group(['prefix' => '/genres', 'middleware' => ['auth:api']], function () {
    Route::post('', [GenreController::class, 'create'])->middleware('can:create,'.Genre::class);
    Route::put('/{genre}', [GenreController::class, 'edit'])->middleware('can:update,genre');
    Route::delete('/{genre}', [GenreController::class, 'delete'])->middleware('can:delete,genre');
});

Route::get('/actors/{actor}', [ActorController::class, 'show']);
Route::get('/actors', [ActorController::class, 'list']);

Route::group(['prefix' => '/actors', 'middleware' => ['auth:api']], function () {
    Route::post('', [ActorController::class, 'create'])->middleware('can:create,'.Actor::class);
    Route::put('/{actor}', [ActorController::class, 'edit'])->middleware('can:update,actor');
    Route::delete('/{actor}', [ActorController::class, 'delete'])->middleware('can:delete,actor');
});
