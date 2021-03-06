<?php

// \DB::listen(function ($query) {
// 	var_dump($query->sql);
// 	var_dump($query->time);
// });

/**
* ---------------------------------------- [ Helpers Routes START ] ----------------------------------------
*/

Route::get('helpers/get-tags', 'HelperController@get_tags');
Route::get('helpers/get-uni-fac', 'HelperController@get_uni_fac');
Route::get('register/get-roles', 'UserController@get_roles');

/**
* ---------------------------------------- [ Helpers Routes END ] ----------------------------------------
*/





/**
* ---------------------------------------- [ Auth Routes START ] ----------------------------------------
*/

Route::group(['namespace' => 'Auth'], function () {
    Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::post('reset-password', 'AuthController@reset_password');
	Route::post('logout', 'AuthController@logout')->middleware('auth:api');
});
    
/**
* ---------------------------------------- [ Auth Routes END ] ----------------------------------------
*/





Route::group(['namespace' => 'Group',  'middleware' => 'auth:api', 'prefix' => 'groups'], function () {
	
	/**
	* ---------------------------------------- [ Group Routes START ] ----------------------------------------
	*/

	Route::get('/', 'GroupController@index');
	Route::post('/', 'GroupController@store');
	Route::get('discover', 'GroupController@discover');
	Route::put('{group}', 'GroupController@update');
	Route::delete('{group}', 'GroupController@delete');
	Route::post('{group}/join', 'GroupController@join');
	Route::post('{group}/leave', 'GroupController@leave');

	/**
	* ---------------------------------------- [ Group Routes END ] ----------------------------------------
	*/



	Route::group(['prefix' => '{group}'], function () {

		/**
		* ------------------------------------ [ Group Lounges Routes START ] ------------------------------------
		*/

		Route::group(['prefix' => 'lounges', 'namespace' => 'Lounge'], function () {
			Route::get('/', 'LoungeController@index');
			Route::post('/', 'LoungeController@store');
			Route::get('{lounge}', 'LoungeController@show');
			Route::put('{lounge}', 'LoungeController@update');
			Route::delete('{lounge}', 'LoungeController@delete');
			Route::group(['prefix' => '{lounge}'], function () {
				Route::post('likes', 'LoungeLikeController@toggle_like');
				Route::post('options/{option}', 'LoungePollController@choose_option');
				Route::group(['prefix' => 'comments'], function () {
					Route::post('/', 'LoungeCommentController@store');
					Route::put('{comment}', 'LoungeCommentController@update');
					Route::delete('{comment}', 'LoungeCommentController@delete');
				});
			});
		});

		/**
		* ------------------------------------ [ Group Lounges Routes END ] ------------------------------------
		*/



		/**
		* ------------------------------------ [ Group Data Routes START ] ------------------------------------
		*/

		Route::group(['prefix' => 'data', 'namespace' => 'Data'], function () {
			Route::get('/', 'DataController@index');
			Route::post('/', 'DataController@store');
			Route::get('saved', 'DataSavedController@get_saved_data');
			Route::post('search', 'DataSearchController@normal_search');
			Route::post('search-in-depth', 'DataSearchController@search_in_depth');
			Route::get('{data}', 'DataController@show');
			Route::put('{data}', 'DataController@update');
			Route::delete('{data}', 'DataController@delete');
			Route::group(['prefix' => '{data}'], function () {
				Route::post('toggle-save', 'DataSavedController@toggle_save_data');	
				Route::post('likes', 'DataLikeController@toggle_like');
				Route::group(['prefix' => 'comments'], function () {
					Route::post('/', 'DataCommentController@store');
					Route::put('{comment}', 'DataCommentController@update');
					Route::delete('{comment}', 'DataCommentController@delete');
				});
			});
		});

		/**
		* ------------------------------------ [ Group Data Routes END ] ------------------------------------
		*/



		/**
		* ------------------------------------ [ Group Assignments Routes START ] ------------------------------------
		*/

		Route::group(['prefix' => 'assignments', 'namespace' => 'Assignment'], function () {
			Route::get('/', 'AssignmentController@index');
			Route::post('/', 'AssignmentController@store');
			Route::get('{assignment}', 'AssignmentController@show');
			Route::put('{assignment}', 'AssignmentController@update');
			Route::delete('{assignment}', 'AssignmentController@delete');
			Route::group(['prefix' => '{assignment}'], function () {
				Route::post('likes', 'AssignmentLikeController@toggle_like');
				Route::group(['prefix' => 'comments'], function () {
					Route::post('/', 'AssignmentCommentController@store');
					Route::put('{comment}', 'AssignmentCommentController@update');
					Route::delete('{comment}', 'AssignmentCommentController@delete');
				});
			});
		});

		/**
		* ------------------------------------ [ Group Assignments Routes END ] ------------------------------------
		*/



		/**
		* ------------------------------------ [ Group Questions Routes START ] ------------------------------------
		*/

		Route::group(['prefix' => 'questions', 'namespace' => 'Question'], function () {
			Route::get('/', 'QuestionController@index');
			Route::post('/', 'QuestionController@store');
			Route::get('{question}', 'QuestionController@show');
			Route::put('{question}', 'QuestionController@update');
			Route::delete('{question}', 'QuestionController@delete');
			Route::group(['prefix' => '{question}'], function () {
				Route::post('likes', 'QuestionLikeController@toggle_like');
				Route::post('saved', 'QuestionSavedController@save_question');
				Route::group(['prefix' => 'comments'], function () {
					Route::post('/', 'QuestionCommentController@store');
					Route::put('{comment}', 'QuestionCommentController@update');
					Route::delete('{comment}', 'QuestionCommentController@delete');
				});
				Route::group(['prefix' => 'answers', 'namespace' => 'Answer'], function () {
					Route::get('/', 'AnswerController@index');
					Route::post('/', 'AnswerController@store');
					Route::get('{answer}', 'AnswerController@show');
					Route::put('{answer}', 'AnswerController@update');
					Route::delete('{answer}', 'AnswerController@delete');
					Route::group(['prefix' => '{answer}'], function () {
						Route::group(['prefix' => 'comments'], function () {
							Route::post('/', 'AnswerCommentController@store');
							Route::put('{comment}', 'AnswerCommentController@update');
							Route::delete('{comment}', 'AnswerCommentController@delete');
						});
					});
				});
			});
		});

		/**
		* ------------------------------------ [ Group Questions Routes END ] ------------------------------------
		*/

	});

});

