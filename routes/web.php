<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'TaskController@index')->name('task.index');
Route::get('/task/edit/{id}', 'TaskController@edit');
Route::post('/task/store','TaskController@store')->name('task.store');
Route::post('/task/update/{id}','TaskController@update')->name('task.update');
Route::delete('/task/delete/{id}','TaskController@destroy')->name('task.destroy');
