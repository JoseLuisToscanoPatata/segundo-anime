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

//Rutas a las que solo pueden acceder usuarios logueados
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    //DASHBOARD
    route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //LISTA DE ANIMES PRINCIPAL
     route::get('/AnimeList', function () {
        return Inertia::render('Anime/AnimeList');
    })->name('AnimeList');

    //LISTA DE ANIMES DE UN USUARIO
    route::get('/AnimeUserList/{id}', function ($id) {
        return Inertia::render('Anime/AnimeUserList',['userList'=>$id]);
    })->name('AnimeUserList');

    //PERFIL DE UN ANIME
    route::get('/AnimeProfile/{id}', function ($id) {
        return Inertia::render('Anime/AnimeShow',['anime'=>$id]);
    })->name('AnimeProfile');

    //LISTA DE MANGAS PRINCIPAL
    route::get('/MangaList', function () {
        return Inertia::render('Manga/MangaList');
    })->name('MangaList');

    //LISTA DE MANGAS DE UN USUARIO
    route::get('/MangaUserList/{id}', function ($id) {
        return Inertia::render('Manga/MangaUserList',['userList'=>$id]);
    })->name('MangaUserList');

    //PERFIL DE UN MANGA
     route::get('/MangaProfile/{id}', function ($id) {
        return Inertia::render('Manga/MangaShow',['manga'=>$id]);
    })->name('MangaProfile');

    //LISTA DE AMIGOS DE UN USUARIO
    route::get('/FriendsList/{id}', function ($id) {
        return Inertia::render('User/Friends',['usuLista'=>$id]);
    })->name('FriendsList');

    //LISTA DE MENSAJES DEL USUARIO AUTENTICADO
    route::get('/MessagesList', function () {
        return Inertia::render('User/Messages');
    })->name('MessagesList');

    //PERFIL DE UN USUARIO
    route::get('/UserShow/{id}', function ($id) {
        return Inertia::render('User/UserShow',['perfil'=>$id]);
    })->name('UserShow');

    //LISTA DE ANIMES COMPARTIDOS ENTRE DOS USUARIOS
    route::get('/SharedLists/{usu1?}/{usu2?}/{tipo?}/{ambos?}', function ($usu1 = '', $usu2 = '', $tipo ='nada', $ambos = false) {
        return Inertia::render('User/SharedLists',['usu1' => $usu1, 'usu2' => $usu2, 'tipo' => $tipo, 'ambos' => $ambos]);
    })->name('SharedLists');

});

//Rutas a las que solo pueden acceder adminsitradores
Route::middleware(['auth:sanctum','verified','admin'])->group(function() {

        //LISTA DE USUARIOS DE LA BASE DE DATOS
        Route::get('/UserAdminList', function () {
            return Inertia::render('User/UserList');
        })->name('UserAdminList');

        //LISTA DE MANGAS DE LA BASE DE DATOS
        Route::get('/MangaAdminList', function () {
            return Inertia::render('Manga/MangaAdminList');
        })->name('MangaAdminList');

        //LISTA DE ANIMES DE LA BASE DE DATOS
        Route::get('/AnimeAdminList', function () {
            return Inertia::render('Anime/AnimeAdminList');
        })->name('AnimeAdminList');
});



