<?php

/*
|--------------------------------------------------------------------
|Application Routes
|--------------------------------------------------------------------
|
|Here is where you can register all of the routes for an application.
|It's simple. Tell Laravel the URIs its should respond to
|and give it the controller to call when that URI is requested.
|
*/

Route::get('/', {
	'as' => 'home',
	'uses' => 'PagesController@home'
});