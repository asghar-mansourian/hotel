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

//    country details section
    Route::get('/country-details', 'CountryDetailController@index')->name('member.countrydetails.index');


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
    Route::get('/tl-balance', 'PaymentController@verify');

    Route::resource('invoices', 'Invoice\InvoiceController');

    Route::resource('orders', 'Order\OrderController');

    Route::get('/my-addresses-abroad', 'AddressesAbroad\AddressesAbroadController@index')->name('my_addresses_abroad');

    Route::get('/tl-balance', 'TlBalance\TlBalanceController@index')->name('tl_balance');

    Route::get('/courier', 'Courier\CourierController@index')->name('courier');

    Route::get('/inquiry', 'Inquiry\InquiryController@index')->name('inquiry');

    Route::post('/inquiry-store', 'Inquiry\InquiryController@store')->name('inquiry_store');

    Route::get('/inquiry-show/{id}', 'Inquiry\InquiryController@show')->name('inquiry_show');

    Route::get('/storage/{id}', 'ImageController@show')->name('storage_image');

});

// web
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/set-locale/{locale}', 'HomeController@setLocale')->name('set_locale');

    Route::get('/blog', 'BlogController@index');
    Route::get('/blog/{id}', 'BlogController@singel')->name('blog.shows');

    Route::get('/contact-us', 'ContactController@index');
    Route::post('/contact-us', 'ContactController@store');

    Route::get('/faq', 'FaqController@index');
    Route::get('/getCurrency', 'CurrencyController@getCurrency');
    Route::get('/getCurrencyFromTwoApi', 'CurrencyController@getCurrencyFromTwoApi');
    Route::get('/getCurrencyFromCrawel', 'CurrencyController@getCurrencyFromCrawel');
    Route::post('/convert', 'CurrencyController@convert');
    Route::post('/getCurrencyCalculator', 'CurrencyController@getCurrencyCalculator');

    Route::get('/how-we-work', function () {
        return view('web.how');
    });

    Route::get('/pricing', 'PricingController@index');

    Route::get('customers', 'CustomerController');

    Route::get('pages/{slug}', 'PageController');

    Route::get('get-price-via-weight/{weight}', 'PriceItemController');

});




