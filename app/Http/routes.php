<?php

/**
 * Rutas web
 */
Route::get('/', ['uses' =>'HomeController@index','as' => '/']);
Route::get('alfabetico', ['uses' =>'HomeController@alfabetico','as' => 'alfabetico']);
Route::get('alfabetico/tema/{id}', ['uses' =>'HomeController@songtheme','as' => 'alfabetico.tema']);
Route::get('secciones', ['uses' =>'HomeController@secciones','as' => 'secciones']);
Route::get('seccion.tema/{id}', ['uses' =>'HomeController@secciontema','as' => 'seccion.tema']);
Route::get('temas', ['uses' =>'HomeController@temas','as' => 'temas']);
Route::get('mostrar/{id}', ['uses' =>'HomeController@mostrar','as' => 'mostrar']);
Route::get('tema/{id}', ['uses' =>'Cancion\CancionController@gettema','as' => 'tema/{id}']);


/**
 * Rutas del Administrador
 */
Route::group(['middleware'=> 'auth'], function() {
	Route::get('admin', [
	'uses' =>'AdminController@index',
	'as' => 'admin'
	]);

});

Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Cancion'],function(){

	Route::resource('cancion','CancionController');
	Route::get('cancion/ver/{id}', [
	'uses' =>'CancionController@verCancion',
	'as' => 'admin.cancion.ver'
	]);
	Route::post('cancion/search', [
	'uses' =>'CancionController@searchSong',
	'as' => 'admin.cancion.search'
	]);


});

Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Seccion'],function(){

	Route::resource('seccion','SeccionController');

});




// Authentication routes...
Route::get('login', [
	 'uses' => 'Auth\AuthController@getLogin',
	 'as' => 'login'
	]);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as'   => 'logout'
	]);

// Registration routes...
Route::get('register', [
	'uses' => 'Auth\AuthController@getRegister',
	'as'   => 'register'
	]);
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('confirmation/{token}',[
	'uses'=> 'Auth\AuthController@getConfirmation',
	'as'=> 'confirmation'
	]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');