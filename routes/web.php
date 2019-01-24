<?php

use Illuminate\Http\Request;
use App\User;


Route::view('/', 'inicio');


Route::post('publicar', 'HomeController@publicar');
Route::post('comentar', 'HomeController@comentar');
Route::post('filtro', 'HomeController@topicid');

Route::get('getpublicacion', 'HomeController@getpublicacion'); // para la solicitud ajax
Route::get('getcomentario', 'HomeController@getcomentario'); // para la solicitud ajax

Route::post('eliminarpost', 'HomeController@eliminarpost');
Route::post('eliminarcomment', 'HomeController@eliminarcomment');
Route::post('editarpublicacion', 'HomeController@editarpublicacion');
Route::post('editarcomentario', 'HomeController@editarcomentario');

Route::get('profile', 'HomeController@profile');
Route::get('home', 'HomeController@index')->name('home');
Route::get('home/{topic}', 'HomeController@topic')->where('topic', '^[A-Za-z_]+$');
Route::get('post/{id}', 'HomeController@postid')->where('id', '^[\d]+$');


Auth::routes();