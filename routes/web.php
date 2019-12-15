<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function(){
   Route::get('/', 'UsersController@index')->name('index');
 /*  Route::get('/cuenta/{id}', 'Auth\RegisterController@show')->name('cuenta');
   Route::get('/nuevo', 'Auth\RegisterController@nuevo');
   Route::get('/cambiar_contrasena', 'Auth\RegisterController@cambiarcontra')->name('cambiarcontra');
   Route::post('/cambiar_contrasena', 'Auth\RegisterController@guardarcambiarcontra');
   Route::post('/guardar', 'Auth\RegisterController@guardar')->name('guardar');
   Route::post('/borrar/{prod}', 'Auth\RegisterController@borrar');
   Route::get('/editar/{id}', 'Auth\RegisterController@editar');
   Route::post('/modificar/{id}', 'Auth\RegisterController@modificar');*/
});

Auth::routes();

