<?php

//* Auth routes  *//
Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', 		            ['as' => 'login',       	    'uses' => 'LoginController@showLoginForm']);
    Route::post('login', 	                ['as' => 'login',               'uses' => 'LoginController@login']);
    Route::get('logout', 		            ['as' => 'logout', 			    'uses' => 'LoginController@logout']);
    Route::get('register',                  ['as' => 'register',    	    'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', 	            ['as' => 'registration',	    'uses' => 'RegisterController@register']);
    Route::get('password/reset',         	['as' => 'password.request',    'uses' => 'ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', 			['as' => 'password.email',      'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token?}',	['as' => 'password.reset', 	    'uses' => 'ResetPasswordController@showResetForm']);
    Route::post('password/reset', 			['as' => 'password.postReset',  'uses' => 'ResetPasswordController@reset']);
});

//* Admin routes *//

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'is_admin']], function() {
    Route::get('',   ['as' => 'dashboard',   'uses' => 'DashboardController@index']);
    
    Route::resource('cities', 'CitiesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('districts', 'DistrictsController');
    Route::resource('restaurants', 'RestaurantsController');
    Route::resource('users', 'UsersController', ['only' => ['index', 'destroy']]);
    Route::resource('productTypes', 'ProductTypesController');
});