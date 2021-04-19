<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

     route::get('/AnimeList', function () {
        return Inertia::render('Anime/AnimeList');
    })->name('AnimeList');

    route::get('/AnimeUserList', function () {
        return Inertia::render('Anime/AnimeUserList');
    })->name('AnimeUserList');

    route::get('/AnimeProfile', function () {
        return Inertia::render('Anime/AnimeShow');
    })->name('AnimeProfile');

    route::get('/MangaList', function () {
        return Inertia::render('Manga/MangaList');
    })->name('MangaList');

    route::get('/MangaUserList', function () {
        return Inertia::render('Manga/MangaUserList');
    })->name('MangaUserList');

     route::get('/MangaProfile', function () {
        return Inertia::render('Manga/MangaShow');
    })->name('MangaProfile');

    route::get('/FriendsList', function () {
        return Inertia::render('User/Friends');
    })->name('FriendsList');

    route::get('/MessagesList', function () {
        return Inertia::render('User/Messages');
    })->name('MessagesList');

    route::get('/UserShow', function () {
        return Inertia::render('User/UserShow');
    })->name('UserShow');
});


Route::middleware(['auth:sanctum','verified','admin'])->group(function() {
        Route::get('/UserAdminList', function () {
            return Inertia::render('User/UserList');
        })->name('UserAdminList');

        Route::get('/MangaAdminList', function () {
            return Inertia::render('Manga/MangaAdminList');
        })->name('MangaAdminList');

        Route::get('/AnimeAdminList', function () {
            return Inertia::render('Anime/AnimeAdminList');
        })->name('AnimeAdminList');
});



