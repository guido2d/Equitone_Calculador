<?php

Route::view('/', 'paso_1')->name('step.1');
Route::get('/siguiente', 'CalculadorController@guardarCookie');
Route::get('/paso2', 'CalculadorController@paso2')->name('step.3');
Route::get('/paso2/{codigo}', 'CalculadorController@paso2Volver');
Route::post('/guardarCalculo', 'CalculadorController@guardarCalculo');
Route::get('/resultados/{codigo}', 'CalculadorController@paso3');
Route::get('/ver-resultados/{codigo}', 'CalculadorController@verResultados');
Route::get('/descargar-pdf/{codigo}', 'CalculadorController@descargarPDF');
Route::get('/ver-pdf/{codigo}', 'CalculadorController@verPDF');
Route::get('/completar-formulario/{codigo}', 'CalculadorController@completarFormulario');
Route::get('/completar-formulario-pdf/{codigo}', 'CalculadorController@completarFormularioPDF');

Route::post('/guardar-datos', 'CalculadorController@guardarDatos');
Route::get('/generate-pdf/{codigo}', 'EmailController@descargarPDF');
Route::post('/enviar-email', 'EmailController@enviarMail');

Route::get('gracias', 'EmailController@gracias');


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::view('/paso-2', 'paso_1a')->name('step.2');