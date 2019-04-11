<?php

Route::view('/', 'paso_1');
Route::get('/paso2', 'CalculadorController@paso2');
Route::view('/paso3', 'paso_3');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
