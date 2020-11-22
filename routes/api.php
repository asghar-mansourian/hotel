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
        Route::post('login', 'Auth\LoginController@login');
        Route::post('register', 'Auth\RegisterController@register');
        Route::get('regions', 'RegionController');
    });

// authenticated
Route::middleware('auth:api')->group(function () {
    // v1
    Route::prefix('v1')
        ->namespace('Api\V1')
        ->group(function () {
            Route::post('logout', 'Auth\LoginController@logout');
            Route::post('me', 'Auth\LoginController@me');
            Route::post('refresh', 'Auth\LoginController@refresh');

            Route::apiResource('invoices', 'InvoiceController');

            Route::apiResource('orders', 'OrderController');

            Route::get('countries', 'CountryController');

            Route::get('branches', 'BranchController');

            Route::post('increment-balance', 'PaymentController@incrementBalance');

            Route::post('currency', 'CurrencyController@getCurrency');

            Route::apiResource('blogs', 'BlogController')->except('update', 'destroy', 'store');

            Route::get('balance/{id}', 'BalanceController@getBalance');

            Route::get('pricing', 'PricingController@list');

            Route::get('stocks', 'StockController');

            Route::get('couriers/product-items', 'CourierController@productItems');

            Route::apiResource('couriers', 'CourierController');

        });
});
