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

Route::get('/',['as' => 'home','uses' => 'AppController@index']);

Route::resource('article','ArticleController');
Route::resource('comment','CommentController');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('auth/register',['as' => 'auth.register','uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',['as' => 'auth.register_check','uses' => 'Auth\AuthController@postRegister']);

Route::get('/donate',['as' => 'donate','uses' => 'PaymentController@preparePayment']);

Route::get('/pay',['as' => 'payment_done','uses' => 'PaymentController@done']);

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
