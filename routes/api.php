<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::post('reset-password', 'AuthController@reset_password');
	Route::post('logout', 'AuthController@logout');
});
    


Route::group(['namespace' => 'Group',  'middleware' => 'auth:api', 'prefix' => 'groups'], function () {
	
	// group resource
	Route::get('discover', 'GroupController@discover');
	Route::post('join', 'GroupController@join');
	Route::get('/', 'GroupController@index');
	Route::post('/', 'GroupController@create');
	Route::put('{$group}', 'GroupController@update');
	Route::delete('{$group}', 'GroupController@delete');


	// group contents routes
	Route::get('{$group}/lounges', 'LoungeController@index');
	Route::get('{$group}/data', 'DataController@index');
	Route::get('{$group}/assignments', 'AssignmentController@index');
	Route::get('{$group}/questions', 'QuestionController@index');


});

