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

Route::group(['prefix' => 'admin'], function () {
    /*      User Routes      */
    Route::get('/login', 'Admin\Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@adminLogin');
    Route::get('/register', 'Admin\Auth\RegisterController@showAdminRegisterForm');
    Route::post('/register', 'Admin\Auth\RegisterController@createAdmin');
    Route::get('/logout', 'Admin\Auth\LoginController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'Auth\LoginController@logout');
