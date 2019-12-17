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
Route::get('/', 'AdminsController@index')->middleware('auth')->name('admin.index');


Route::group(['prefix' => 'users', 'middleware' => 'auth'], function(){
   Route::get('/', 'UsersController@index')->name('users.index')->middleware('can:users.index');
;
 /*  Route::get('/cuenta/{id}', 'Auth\RegisterController@show')->name('cuenta');
   Route::get('/nuevo', 'Auth\RegisterController@nuevo');
   Route::get('/cambiar_contrasena', 'Auth\RegisterController@cambiarcontra')->name('cambiarcontra');
   Route::post('/cambiar_contrasena', 'Auth\RegisterController@guardarcambiarcontra');
   Route::post('/guardar', 'Auth\RegisterController@guardar')->name('guardar');
   Route::post('/borrar/{prod}', 'Auth\RegisterController@borrar');
   Route::get('/editar/{id}', 'Auth\RegisterController@editar');
   Route::post('/modificar/{id}', 'Auth\RegisterController@modificar');*/
});

Route::group(['prefix' => 'roles', 'middleware' => 'auth'], function(){

	Route::get('/', 'RolesController@index')->name('roles.index');//->middleware('permission:roles.index');

	Route::get('{role}', 'RolesController@show')->name('roles.show');//->middleware('permission:roles.show');

	Route::post('store', 'RolesController@store')->name('roles.store');//->middleware('permission:roles.create');

	Route::get('create', 'RolesController@create')->name('roles.create');//->middleware('permission:roles.create');

	Route::get('edit/{role}', 'RolesController@edit')->name('roles.edit');//->middleware('permission:roles.edit');

	Route::put('edit/{role}', 'RolesController@update')->name('roles.update');//->middleware('permission:roles.edit');

	Route::delete('{role}', 'RolesController@destroy')->name('roles.destroy');//->middleware('permission:roles.destroy');

});

Auth::routes();

