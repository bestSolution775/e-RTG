<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'CountryController@index');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::delete("user/destroy{id}",'UserController@destroy');


	Route::resource('countries', 'CountryController');
	Route::resource('distributors', 'DistributorController');
	Route::resource('customers', 'CustomerController');
	Route::resource('categories', 'CategoryController');
	Route::resource('attributes', 'AttributeController');
	Route::resource('items', 'ItemController');
	Route::resource('pushtoretailers', 'PushToRetailerController');

	Route::post('distributors/search', ['as' => 'distributors.search', 'uses' => 'DistributorController@search']);
	Route::post('customers/search', ['as' => 'customers.search', 'uses' => 'CustomerController@search']);
	Route::post('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
	Route::post('pushtoretailer/search', ['as' => 'pushtoretailers.search', 'uses' => 'PushToRetailerController@search']);
});

