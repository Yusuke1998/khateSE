<?php

use Illuminate\Http\Request;

Auth::routes();
Route::get('/','HomeController@inicio');
Route::get('home', 'HomeController@index')->name('home');

// Route::post('publicar', 'HomeController@publicar');
// Route::post('comentar', 'HomeController@comentar');
// Route::post('filtro', 'HomeController@topicid');
// Route::post('eliminarpost', 'HomeController@eliminarpost');
// Route::get('post/{id}', 'HomeController@postid')->where('id', '^[\d]+$');


// Perfil
Route::get('profile', 'HomeController@profile');
Route::post('editarperfil', 'HomeController@editarperfil');

// contenido
Route::post('addcontent', 'HomeController@addContent');
Route::post('addcontenttext', 'HomeController@addcontenttext');
Route::get('videos', 'HomeController@videos');
Route::get('imagenes', 'HomeController@imagenes');
Route::get('estudiantes', 'HomeController@estudiantes');
Route::get('pruebas', 'HomeController@pruebas');
Route::post('addtema', 'HomeController@addtema');
Route::get('tema/{topic}', 'HomeController@topic')->where('topic', '^[A-Za-z0-9_]+$');
Route::post('addseccion', 'HomeController@addseccion');
Route::get('historial/{student_id}','HomeController@historial')->name('historial');

// evaluacion con google forms
Route::post('addeval', 'HomeController@addeval');
// evaluacion normal
Route::post('addevaluacion', 'HomeController@addevaluacion');
Route::post('addpregunta', 'HomeController@addpregunta');
Route::post('addrespuesta', 'HomeController@addrespuesta');
Route::get('evaluaciones', 'HomeController@evaluaciones');
Route::get('estudiante/evaluacion/{id}','testController@evaluacion_estudiante')->name('estudiante.evaluacion');
Route::post('pregunta/guardar','testController@pregunta_guardar')->name('pregunta.guardar');
Route::get('respuesta/{id_test}/{id_question}','testController@respuesta')->name('respuesta');
Route::post('respuesta/guardar','testController@respuesta_guardar')->name('respuesta.guardar');
Route::get('evaluacion/{id}','testController@evaluacion')->name('evaluacion.ver');
Route::get('pregunta/{id_test}','testController@pregunta')->name('pregunta');
// Notas
Route::get('nota/{people}/{test}/{question}/{answer}','testController@nota')->name('nota.nueva');
Route::post('asignar/nota','testController@asignar_nota')->name('nota.asignar');