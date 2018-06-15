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

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

Route::group(['prefix' => 'auth'], function(){

	Route::get('register', [
		'as' => 'get_register',
		'uses' => 'Auth\AuthController@getRegister'
	]);

	Route::post('register', [
		'as' => 'post_register',
		'uses' => 'Auth\AuthController@postRegister'
	]);

	Route::get('login', [
		'as' => 'get_login',
		'uses' => 'Auth\AuthController@getLogin'
	]);

	Route::post('login', [
		'as' => 'post_login',
		'uses' => 'Auth\AuthController@postLogin'
	]);

	Route::get('logout', [
		'as' => 'get_logout',
		'uses' => 'Auth\AuthController@getLogout'
	]);
});


Route::group(['prefix' => 'question'], function(){
	Route::get('post', [
		'as' => 'get_post',
		'uses' => 'ForumController@getPost'
	]);

	Route::post('post', [
		'as' => 'post_question',
		'uses' => 'ForumController@postQuestion'
	]);

	Route::get('{id}/edit', [
		'as' => 'get_edit_post',
		'uses' => 'ForumController@getEditPost'
	]);

	Route::post('edit', [
		'as' => 'edit_post',
		'uses' => 'ForumController@saveEditPost'
	]);

	Route::delete('post', [
		'as' => 'delete_question',
		'uses' => 'ForumController@deleteQuestion'
	]);

	Route::get('{slug}', [
		'as' => 'view_post',
		'uses' => 'ForumController@viewPost'
	]);

	Route::post('reply', [
		'as' => 'save_reply',
		'uses' => 'ForumController@saveReply'
	]);

	Route::delete('reply', [
		'as' => 'delete_reply',
		'uses' => 'ForumController@deleteReply'
	]);


});