<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Models\Anime;
use App\Models\User;

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

//Ruta por defecto de inertia para obtener usuarios
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas hacia los controladores de api

//User Controller
Route::apiResource('users',UserController::class)->middleware('auth:sanctum')->only([
    'index', 'show','destroy','update']);

//Anime Controller 
Route::apiResource('animes',AnimeController::class)->middleware('auth:sanctum');

//Manga Controller
Route::apiResource('mangas',MangaController::class)->middleware('auth:sanctum');

//Read Controller
Route::apiResource('reads',ReadController::class)->middleware('auth:sanctum')->except(['index']);
Route::middleware('auth:sanctum')->get("/readsIndex/{user}", [readController::class, "index"])->name('reads.index');

//Watch Controller
Route::apiResource('watches',WatchController::class)->middleware('auth:sanctum')->except(['index']);
Route::middleware('auth:sanctum')->get("/watchesIndex/{user}", [watchController::class, "index"])->name('watches.index');

//Friend Controller
Route::apiResource('friends',FriendController::class)->middleware('auth:sanctum')->except(['index']);
Route::middleware('auth:sanctum')->get("/friendsIndex/{user}", [friendController::class, "index"])->name('friends.index');

//Message Controller
Route::apiResource('messages',MessageController::class)->middleware('auth:sanctum')->except(['update']);

//Rutas para login, registro y obtención de datos de usuario propias
Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::middleware('auth:sanctum')->get("/userApi", [UserController::class, "user"]);
