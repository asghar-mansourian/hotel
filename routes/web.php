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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /*      User Routes      */
    Route::get('/login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@adminLogin');
    Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm');
    Route::post('/register', 'Auth\RegisterController@createAdmin');
    Route::get('/logout', 'Auth\LoginController@logout');
});

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/blog', 'BlogController@index');
    Route::get('/blog/{id}', 'BlogController@singel');

    Route::get('/contact-us', 'ContactController@index');
    Route::post('/contact-us', 'ContactController@store');

    Route::get('/faq', 'FaqController@index');
});

// section user panel
Route::group(['namespace' => 'Member'], function () {
    Auth::routes();

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'PanelController@index')->name('panel');

    Route::get('/setting', 'SettingController@index');
    Route::post('/setting/changeProfileInformation', 'SettingController@changeProfileInformation');
    Route::post('/setting/changePassword', 'SettingController@changePassword');
    Route::post('/setting/changeOther', 'SettingController@changeOther');
    Route::post('/setting/getCurrency', 'SettingController@getCurrency');

    Route::resource('invoices', 'Invoice\InvoiceController');
});
