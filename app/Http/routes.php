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

Route::get('/admin', array(
	'as' => 'login_index',
	'uses' => 'Auth\AuthController@index'
));

Route::post('/verifylogin', array(
	'as' => 'verify_login',
	'uses' => 'Auth\AuthController@verifylogin'
));

Route::get('/logout', array(
	'as' => 'logout',
	'uses' => 'Auth\AuthController@logout'
));

Route::group(['middleware' => 'admin_auth'], function (){
	include app_path().'/Http/adminRoutes.php';
});

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));

Route::post('/contact-us', array(
	'as' => 'contact_us_submit',
	'uses' => 'MessagesController@submit'
));

Route::post('/subscribe-news-letter', array(
	'as' => 'subscribe_news_letter',
	'uses' => 'NewsLetterController@submit'
));