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
route::post('/users/show' , 'UserController@show');
route::get('/users/destroy/{id}' , 'UserController@destroy');
route::post('/users/search/' , 'UserController@search');
route::post('/users/sort/' , 'UserController@sort');
route::post('/users/filter/' , 'UserController@filter');
route::post('/users/export/{type}' , 'UserController@export');


//Route::get('/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
//Route::post('/login', 'Auth\LoginController@adminLogin');
//Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm');
//Route::post('/register', 'Auth\RegisterController@createAdmin');
//Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('admin.home');


