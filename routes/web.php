<?php

use Illuminate\Http\Request;
use App\User;


Route::view('/', 'inicio');


Route::post('publicar', 'HomeController@publicar');
Route::post('comentar', 'HomeController@comentar');
Route::post('filtro', 'HomeController@topicid');

Route::post('eliminarpost', 'HomeController@eliminarpost');
Route::post('eliminarcomment', 'HomeController@eliminarcomment');

Route::get('profile', 'HomeController@profile');
Route::get('home', 'HomeController@index')->name('home');
Route::get('home/{topic}', 'HomeController@topic')->where('topic', '^[A-Za-z_]+$');
Route::get('post/{id}', 'HomeController@postid')->where('id', '^[\d]+$');


Auth::routes();