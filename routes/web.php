<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',[
	'uses'  => 'ProductController@getIndex',
	'as'    => 'product.index'
]);

Route::get('/checkout',[
	'uses'  => 'ProductController@getCheckout',
	'as'    => 'product.checkout',
	'middleware' =>'auth'
]);


Route::post('/checkout',[
	'uses'  => 'ProductController@postCheckout',
	'as'    => 'product.checkout',
	'middleware' =>'auth'
]);


Route::group(['prefix'=>'user', 'middleware'=>'guest'], function(){

	Route::get('/signup',[
		'uses'  => 'UserController@getSignUp',
		'as'    => 'user.signup'
	]);

	Route::post('/signup',[
		'uses'  => 'UserController@postSignUp',
		'as'    => 'user.signup'
	]);


	Route::get('/signin',[
		'uses' => 'UserController@getSignIn',
		'as'   => 'user.signin'
	]);

	Route::post('/signin',[
		'uses' => 'UserController@postSignIn',
		'as'   => 'user.signin'
	]);

});


Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){

	Route::get('/profile',[
			'uses' => 'UserController@getProfile',
			'as'   => 'user.profile'
	]);

	Route::get('/logout',[
		'uses' => 'UserController@getLogout',
		'as'   => 'user.logout'
	]);
});


Route::get('/add-to-cart/{id}',[
	'uses'  => 'ProductController@getAddToCart', 
	'as'    => 'product.add-to-cart'
]);


Route::get('/shopping-cart',[
	'uses'  => 'ProductController@getCart', 
	'as'    => 'product.shoppingcart'
]);


