<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return Redirect::route('dashboard');
});


Route::group(['middleware' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	// Route::get('user/create', ['as'=>'user.create','uses' => 'UsersController@create']);
	// Route::post('user/store', ['as'=>'user.store','uses' => 'UsersController@store']);
	Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));


	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});



Route::group(array('middleware' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));


	// Now starts the routes
	Route::get('building/show/all', ['as'=>'building.index','uses' => 'BuildingsController@index']);
	Route::get('building/create', ['as'=>'building.create','uses' => 'BuildingsController@create']);
	Route::post('building/create', ['as' => 'building.store','uses' => 'BuildingsController@store']);
	Route::get('building/edit/{id}', ['as'=>'building.edit','uses' => 'BuildingsController@edit']);
	Route::put('building/update/{id}', ['as'=>'building.update','uses' => 'BuildingsController@update']);

	Route::get('building/{id}/classrooms', ['as'=>'building.classroom','uses' => 'ClassroomController@index']);
	Route::get('building/{id}/labrooms', ['as'=>'building.labroom','uses' => 'LabroomController@index']);
	Route::get('building/{id}/other_rooms', ['as'=>'building.others','uses' => 'OthersroomController@index']);

	Route::get('building/{id}/classroom/create', ['as'=>'classroom.create','uses' => 'ClassroomController@create']);
	Route::post('building/{id}/classroom/create', ['as' => 'classroom.store','uses' => 'ClassroomController@store']);
	Route::get('classroom/edit/{id}', ['as' => 'classroom.edit','uses' => 'ClassroomController@edit']);
	Route::put('classroom/update/{id}', ['as' => 'classroom.update','uses' => 'ClassroomController@update']);
	
	Route::get('building/{id}/labroom/create', ['as'=>'labroom.create','uses' => 'LabroomController@create']);
	Route::post('building/{id}/labroom/create', ['as' => 'labroom.store','uses' => 'LabroomController@store']);
	Route::get('labroom/edit/{id}', ['as'=>'labroom.edit','uses' => 'LabroomController@edit']);
	Route::put('labroom/update/{id}', ['as' => 'labroom.update','uses' => 'LabroomController@update']);

	Route::get('building/{id}/otherRoom/create', ['as'=>'otherRoom.create','uses' => 'OthersroomController@create']);
	Route::post('building/{id}/otherRoom/create', ['as' => 'otherRoom.store','uses' => 'OthersroomController@store']);
	Route::get('otherRoom/edit/{id}', ['as'=>'otherRoom.edit','uses' => 'OthersroomController@edit']);
	Route::put('otherRoom/update/{id}', ['as' => 'otherRoom.update','uses' => 'OthersroomController@update']);

});




