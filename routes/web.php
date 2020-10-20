<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin' ], function () {
    /*      User Routes      */
    Route::get('/login', 'Admin\Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@adminLogin');
    Route::get('/register', 'Admin\Auth\RegisterController@showAdminRegisterForm');
    Route::post('/register', 'Admin\Auth\RegisterController@createAdmin');
    Route::get('/logout', 'Admin\Auth\LoginController@logout');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Member\Auth\LoginController@logout');


Route::group(['namespace' => 'Member'], function () {
    \Auth::routes();
});

Route::get('/setting', 'Member\SettingController@index');
Route::post('/setting/changeProfileInformation', 'Member\SettingController@changeProfileInformation');
Route::post('/setting/changePassword', 'Member\SettingController@changePassword');
Route::post('/setting/changeOther', 'Member\SettingController@changeOther');
Route::post('/setting/getCurrency', 'Member\SettingController@getCurrency');

Route::get('/blog', 'Web\BlogController@index');
Route::get('/blog/{id}', 'Web\BlogController@singel');

Route::get('/contact-us', 'Web\ContactController@index');
Route::post('/contact-us', 'Web\ContactController@store');
