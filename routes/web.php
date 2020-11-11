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

// user panel (Member)
Route::group(['namespace' => 'Member'], function () {
    Auth::routes();

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'PanelController@index')->name('panel');

    Route::get('/setting', 'SettingController@index');
    Route::post('/setting/changeProfileInformation', 'SettingController@changeProfileInformation');
    Route::post('/setting/changePassword', 'SettingController@changePassword');
    Route::post('/setting/changeOther', 'SettingController@changeOther');
    Route::post('/setting/getCurrency', 'SettingController@getCurrency');
    Route::get('/setting/getCurrency/{id}/{type}', 'SettingController@getCurrencyOnce');

    Route::get('/payment/verify', 'PaymentController@index');
    Route::post('/payment/verify', 'PaymentController@card');
    Route::post('/payment/gate', 'PaymentController@gate');
    Route::get('/payment/redirect', 'PaymentController@redirect');
    Route::get('/payment/delivery', 'PaymentController@delivery');

    Route::get('/az-balance', 'PaymentController@verify');

    Route::resource('invoices', 'Invoice\InvoiceController');

    Route::resource('orders', 'Order\OrderController');

    Route::view('/addressesabroad', '/members/addressesabroad');

});

// web
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/set-locale/{locale}', 'HomeController@setLocale')->name('set_locale');

    Route::get('/blog', 'BlogController@index');
    Route::get('/blog/{id}', 'BlogController@singel');

    Route::get('/contact-us', 'ContactController@index');
    Route::post('/contact-us', 'ContactController@store');

    Route::get('/faq', 'FaqController@index');
    Route::get('/getCurrency', 'CurrencyController@getCurrency');
    Route::post('/convert', 'CurrencyController@convert');

    Route::get('/how-we-work', function (){
        return view('web.how');
    });

    Route::get('/pricing', 'FaqController@index');
});




