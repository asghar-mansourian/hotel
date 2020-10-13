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
    return view('welcome');
});

//Route::group(['prefix' => 'admin'], function () {
//    /*      User Routes      */
//    route::get('/users' , 'Admin\UserController@index');
//    route::get('/users/load' , 'Admin\UserController@load');
//    route::get('/users/create/' , 'Admin\UserController@create');
//    route::post('/users/store/' , 'Admin\UserController@store');
//    route::get('/users/edit/{id}' , 'Admin\UserController@edit');
//    route::post('/users/update/{id}' , 'Admin\UserController@update');
//    route::post('/users/show' , 'Admin\UserController@show');
//    route::get('/users/destroy/{id}' , 'Admin\UserController@destroy');
//    route::post('/users/search/' , 'Admin\UserController@search');
//    route::post('/users/sort/' , 'Admin\UserController@sort');
//    route::post('/users/filter/' , 'Admin\UserController@filter');
//    route::post('/users/export/{type}' , 'Admin\UserController@export');
//});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['namespace' => 'Member'], function () {
    \Auth::routes();
});


