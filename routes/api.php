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
        Route::post('refresh', 'Auth\LoginController@refresh');
        Route::post('register', 'Auth\RegisterController@register');
    });

// authenticated
Route::middleware('auth:api')->group(function () {
    // v1
    Route::prefix('v1')
        ->namespace('Api\V1')
        ->group(function () {
            Route::post('logout', 'Auth\LoginController@logout');
            Route::post('me', 'Auth\LoginController@me');

            Route::apiResource('invoices', 'InvoiceController');

            Route::apiResource('orders', 'InvoiceController');

            Route::get('countries', 'CountryController');

            Route::get('regions', 'RegionController');

        });
});
