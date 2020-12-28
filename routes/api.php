<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// auth
Route::prefix('v1')
    ->namespace('Api\V1')
    ->group(function () {
        Route::post('/notif/', 'NotificationController@storeWithFireBase');
        Route::post('login', 'Auth\LoginController@login');

        Route::post('register', 'Auth\RegisterController@register');

        Route::get('regions', 'RegionController');

        Route::post('countryByRegion', 'RegionController@countryByRegion');

        Route::get('countries', 'CountryController');

        Route::get('faqs', 'FaqController');

        Route::get('pages/{slug}', 'PageController');

        Route::apiResource('blogs', 'BlogController')->except('update', 'destroy', 'store');

        Route::get('get-price-via-weight/{weight}', 'PriceItemController');

        Route::get('send-sms', 'Auth\SmsController@sendSmsToUser')->middleware('auth:api');
        Route::post('verify-sms', 'Auth\SmsController@verifiedUser')->middleware('auth:api');

        Route::get('/get-translate-list','TranslateController@getTranslate');

    });

// authenticated
Route::middleware(['auth:api' , 'verified_sms'])->group(function () {
    // v1
    Route::prefix('v1')
        ->namespace('Api\V1')
        ->group(function () {
            Route::post('logout', 'Auth\LoginController@logout');
            Route::post('me', 'Auth\LoginController@me');
            Route::post('refresh', 'Auth\LoginController@refresh');

            Route::apiResource('invoices', 'InvoiceController');

            Route::apiResource('orders', 'OrderController');

            Route::get('branches', 'BranchController');

            Route::post('increment-balance', 'PaymentController@incrementBalance');

            Route::post('currency', 'CurrencyController@getCurrency');

            Route::post('user/balance', 'BalanceController');

            Route::get('pricing', 'PricingController@list');

            Route::get('stocks', 'StockController');

            Route::get('couriers/product-items', 'CourierController@productItems');

            Route::apiResource('couriers', 'CourierController');

            Route::get('user-settings/show', 'UserSettingController@show');
            Route::put('user-settings/update', 'UserSettingController@update');
            Route::put('user-settings/update-password', 'UserSettingController@updatePassword');

            Route::post('/notifications', 'NotificationController@send');

            Route::get('/cash-payments','PaymentController@getPaymentsCash');

            Route::get('/invoice-status-key','InvoiceController@getStatusKey');

            Route::get('/order-status-key','OrderController@getStatusKey');

            Route::post('/basket/store','OrderController@storeToBasket');
            Route::get('/basket','OrderController@basket');
            Route::post('/basket/delete','OrderController@deleteBasket');

            Route::post('/crawler/get','CrawlerController@get');

            Route::get('country-detail', 'CountryDetailController');

        });
});
