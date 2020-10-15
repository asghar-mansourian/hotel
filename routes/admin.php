<?php

use Illuminate\Support\Facades\Auth;
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

/*      User Routes      */
route::get('/users' , 'UserController@index');
route::get('/users/load' , 'UserController@load');
route::get('/users/create/' , 'UserController@create');
route::post('/users/store/' , 'UserController@store');
route::get('/users/edit/{id}' , 'UserController@edit');
route::post('/users/update/{id}' , 'UserController@update');
route::get('/users/destroy/{id}' , 'UserController@destroy');
route::post('/users/search/' , 'UserController@search');
route::post('/users/sort/' , 'UserController@sort');


/*      Country Routes      */
route::get('/countries' , 'CountryController@index');
route::get('/countries/load' , 'CountryController@load');
route::get('/countries/create/' , 'CountryController@create');
route::post('/countries/store/' , 'CountryController@store');
route::get('/countries/edit/{id}' , 'CountryController@edit');
route::post('/countries/update/{id}' , 'CountryController@update');
route::get('/countries/destroy/{id}' , 'CountryController@destroy');
route::post('/countries/search/' , 'CountryController@search');
route::post('/countries/sort/' , 'CountryController@sort');


/*      Region Routes      */
route::get('/regions' , 'RegionController@index');
route::get('/regions/load' , 'RegionController@load');
route::get('/regions/create/' , 'RegionController@create');
route::post('/regions/store/' , 'RegionController@store');
route::get('/regions/edit/{id}' , 'RegionController@edit');
route::post('/regions/update/{id}' , 'RegionController@update');
route::get('/regions/destroy/{id}' , 'RegionController@destroy');
route::post('/regions/search/' , 'RegionController@search');
route::post('/regions/sort/' , 'RegionController@sort');

Route::get('/home', 'HomeController@index')->name('admin.home');


