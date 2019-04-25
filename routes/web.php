<?php

Route::view('/', 'paso_1');
Route::get('/siguiente', 'CalculadorController@guardarCookie');
Route::get('/paso2', 'CalculadorController@paso2');
Route::get('/paso2/{codigo}', 'CalculadorController@paso2Volver');
Route::post('/guardarCalculo', 'CalculadorController@guardarCalculo');
Route::get('/resultados/{codigo}', 'CalculadorController@paso3');
Route::get('/descargar-pdf/{codigo}', 'CalculadorController@descargarPDF');
Route::get('/ver-pdf/{codigo}', 'CalculadorController@verPDF');
Route::get('/completar-formulario/{codigo}', 'CalculadorController@completarFormulario');
Route::get('/completar-formulario-pdf/{codigo}', 'CalculadorController@completarFormularioPDF');

Route::post('/enviar-email', 'EmailController@enviarMail');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
