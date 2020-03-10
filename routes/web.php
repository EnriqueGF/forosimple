<?php

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

Route::get('/', "InicioController@listarHilos")->name("inicio");

Route::get('/login', "UserController@loginView")->name("login");
Route::post('/login', "UserController@loginPost")->name("login-post");

Route::get('/register', "UserController@registerView")->name("register");
Route::post('/register', "UserController@registerPost")->name("register-post");

Route::get('/logout', "UserController@logout")->name("logout");

Route::get('/crearTema', "TemasController@crearTemaView")->name("creartema")->middleware('auth');;
Route::post('/crearTema', "TemasController@crearTema")->name("creartema-post")->middleware('auth');

Route::get('/verTema/{id}', "TemasController@verTema")->name("vertema");;

Route::post('/respondertema/{id}', "TemasController@responderTema")->name("respondertema-post")->middleware('auth');
