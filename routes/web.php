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
   
   Route::post('store', 'UsersController@store')->name('users.store')->middleware('can:users.create');

   Route::delete('destroy/{user}', 'UsersController@destroy')->name('users.destroy')->middleware('can:users.destroy');
 
});

Route::group(['prefix' => 'roles', 'middleware' => 'auth'], function(){

	Route::get('/', 'RolesController@index')->name('roles.index')->middleware('can:roles.index');

	Route::get('{role}', 'RolesController@show')->name('roles.show')->middleware('can:roles.show');

	Route::post('store', 'RolesController@store')->name('roles.store')->middleware('can:roles.create');

	Route::get('create', 'RolesController@create')->name('roles.create')->middleware('can:roles.create');

	Route::get('edit/{role}', 'RolesController@edit')->name('roles.edit')->middleware('can:roles.edit');

	Route::put('edit/{role}', 'RolesController@update')->name('roles.update')->middleware('can:roles.edit');

	Route::delete('{role}', 'RolesController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');

});

Auth::routes();

