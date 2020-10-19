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

/*      Uploader Routes      */
Route::get('/uploader/filesUploader' , 'UploaderController@filesUploaderIndex');
Route::post('/uploader/filesUploader' , 'UploaderController@filesUploaderStore');
Route::post('/uploader/videoUploader' , 'UploaderController@videoUploaderStore');
Route::post('/editor/ckeditorUploader', 'UploaderController@ckeditorUploader')->name('ckeditor');
Route::get('/editor/ckeditor' , 'UploaderController@ckeditor');


/*      Pages Routes      */
route::get('/pages' , 'PageController@index');
route::get('/pages/load' , 'PageController@load');
route::get('/pages/create/' , 'PageController@create');
route::post('/pages/store/' , 'PageController@store');
route::get('/pages/edit/{id}' , 'PageController@edit');
route::post('/pages/update/{id}' , 'PageController@update');
route::get('/pages/destroy/{id}' , 'PageController@destroy');
route::post('/pages/search/' , 'PageController@search');
route::post('/pages/sort/' , 'PageController@sort');

/*      Blogs Routes      */
route::get('/blogs' , 'BlogController@index');
route::get('/blogs/load' , 'BlogController@load');
route::get('/blogs/create/' , 'BlogController@create');
route::post('/blogs/store/' , 'BlogController@store');
route::get('/blogs/edit/{id}' , 'BlogController@edit');
route::post('/blogs/update/{id}' , 'BlogController@update');
route::get('/blogs/destroy/{id}' , 'BlogController@destroy');
route::post('/blogs/search/' , 'BlogController@search');
route::post('/blogs/sort/' , 'BlogController@sort');
