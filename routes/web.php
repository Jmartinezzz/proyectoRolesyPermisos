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

   Route::get('edit/{user}', 'UsersController@edit')->name('users.edit')->middleware('can:users.edit')->where('id', '[0-9]+');

   Route::put('edit/{user}', 'UsersController@update')->name('users.update')->middleware('can:users.edit');
   
   Route::get('users-list-pdf', 'UsersController@exportPDF')->name('users.export'); //->middleware('can:users.edit');
 
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth','web']], function(){

	Route::get('/', 'RolesController@index')->name('roles.index')->middleware('can:roles.index');

	Route::get('{role}', 'RolesController@show')->name('roles.show')->middleware('can:roles.show');

	Route::post('store', 'RolesController@store')->name('roles.store')->middleware('can:roles.create');

	Route::get('create', 'RolesController@create')->name('roles.create')->middleware('can:roles.create');

	Route::get('edit/{role}', 'RolesController@edit')->name('roles.edit')->middleware('can:roles.edit');

	Route::put('edit/{role}', 'RolesController@update')->name('roles.update')->middleware('can:roles.edit');

	Route::delete('{role}', 'RolesController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');

});

Route::group(['prefix' => 'permissions', 'middleware' => ['auth','web']], function(){

   Route::get('/', 'PermissionsController@index')->name('permissions.index')->middleware('can:permissions.index');

   Route::get('{permission}', 'PermissionsController@show')->name('permissions.show')->middleware('can:permissions.show');

   Route::post('store', 'PermissionsController@store')->name('permissions.store')->middleware('can:permissions.create');

   Route::get('create', 'PermissionsController@create')->name('permissions.create')->middleware('can:permissions.create');

   Route::get('edit/{permission}', 'PermissionsController@edit')->name('permissions.edit')->middleware('can:permissions.edit');

   Route::put('edit/{permission}', 'PermissionsController@update')->name('permissions.update')->middleware('can:permissions.edit');

   Route::delete('{permission}', 'PermissionsController@destroy')->name('permissions.destroy')->middleware('can:permissions.destroy');

});

Auth::routes();

/*ruta para cambiar de idioma*/
Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');
/*ruta para cambiar de idioma*/
