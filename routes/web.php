<?php

use Illuminate\Http\Request;

Auth::routes();
Route::get('/','HomeController@inicio');
Route::get('home', 'HomeController@index')->name('home');

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

// evaluacion de seleccion simple
Route::post('addevaluacionsimple', 'TestSimpleController@addevaluacionsimple');
Route::post('pregunta/simple/guardar','TestSimpleController@pregunta_guardar')->name('preguntasimple.guardar');

Route::post('respuesta/simple/guardar', 'TestSimpleController@respuesta_guardar')->name('respuestasimple.guardar');

Route::get('evaluacion/simple/{id}','TestSimpleController@evaluacion')->name('evaluacionsimple.ver');

Route::get('pregunta/simple/{id_test}','TestSimpleController@pregunta')->name('preguntasimple');

Route::get('respuesta/simple/{id_test}/{id_question}','TestSimpleController@respuesta')->name('respuestasimple');

Route::get('respuestas/simples/{id_test}/{id_question}','TestSimpleController@respuestas')
->name('respuestassimples.todas');

Route::get('respuesta/simple/asignar/{id_question}/{number}','TestSimpleController@asignar')->name('asignar');

// evaluacion normal
Route::post('addevaluacion', 'testController@addevaluacion');
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