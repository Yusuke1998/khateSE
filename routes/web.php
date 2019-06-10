<?php

use Illuminate\Http\Request;
use App\User;


Route::view('/', 'inicio');


Route::post('publicar', 'HomeController@publicar');
Route::post('comentar', 'HomeController@comentar');
Route::post('filtro', 'HomeController@topicid');


Route::post('eliminarpost', 'HomeController@eliminarpost');


Route::post('editarperfil', 'HomeController@editarperfil');

Route::get('profile', 'HomeController@profile');
Route::get('post/{id}', 'HomeController@postid')->where('id', '^[\d]+$');

Route::post('addtema', 'HomeController@addtema');
// Route::post('addeval', 'HomeController@addeval');


Auth::routes();

Route::post('addcontent', 'HomeController@addContent');
Route::post('addcontenttext', 'HomeController@addcontenttext');
Route::get('home', 'HomeController@index')->name('home');
Route::get('videos', 'HomeController@videos');
Route::get('imagenes', 'HomeController@imagenes');
Route::get('estudiantes', 'HomeController@estudiantes');
Route::get('pruebas', 'HomeController@pruebas');
Route::get('tema/{topic}', 'HomeController@topic')->where('topic', '^[A-Za-z0-9_]+$');
Route::get('descarga/{id}', 'HomeController@descarga')->where('id', '^[0-9]+$');