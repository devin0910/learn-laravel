<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	//var_dump(Config::get('app.timezone'));
	return View::make('hello');
});*/

Route::get('/', "HomeController@showWelcome");

// route parameters
Route::get('/{category?}', function ($category = 'efg') {
	return Redirect::to('/');
	return $category;
});

Route::get('custom/response', function () {
	$response = Response::make('Hello world!', 200);
	$response->headers->set('our key', 'our value');
	return $response;
});

Route::get('markdown/response', function () {
	/*$response = Response::make('***some bold text***', 200);
	$response->headers->set('Conetent-Type', 'text/x-markdown');
	return $response;*/

	$data = array('iron', 'man', 'rocks');
	return Response::json($data);
});