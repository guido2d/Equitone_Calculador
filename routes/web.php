<?php

Route::view('/', 'paso_1');
Route::get('/siguiente', 'CalculadorController@guardarCookie');
Route::get('/paso2', 'CalculadorController@paso2');
Route::get('/paso2/{codigo}', 'CalculadorController@paso2Volver');
Route::post('/guardarCalculo', 'CalculadorController@guardarCalculo');
Route::get('/resultados/{codigo}', 'CalculadorController@paso3');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
