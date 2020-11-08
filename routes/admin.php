<?php

use Illuminate\Support\Facades\Auth;
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

/*      User Routes      */
route::get('/users' , 'UserController@index');
route::get('/users/load' , 'UserController@load');
route::get('/users/create/' , 'UserController@create');
route::post('/users/store/' , 'UserController@store');
route::get('/users/edit/{id}' , 'UserController@edit');
route::post('/users/update/{id}' , 'UserController@update');
route::get('/users/destroy/{id}' , 'UserController@destroy');
route::get('/users/show/{id}' , 'UserController@show');
route::post('/users/search/' , 'UserController@search');
route::post('/users/sort/' , 'UserController@sort');


/*      Country Routes      */
route::get('/countries' , 'CountryController@index');
route::get('/countries/load' , 'CountryController@load');
route::get('/countries/create/' , 'CountryController@create');
route::post('/countries/store/' , 'CountryController@store');
route::get('/countries/edit/{id}' , 'CountryController@edit');
route::post('/countries/update/{id}' , 'CountryController@update');
route::get('/countries/destroy/{id}' , 'CountryController@destroy');
route::post('/countries/search/' , 'CountryController@search');
route::post('/countries/sort/' , 'CountryController@sort');


/*      Region Routes      */
route::get('/regions' , 'RegionController@index');
route::get('/regions/load' , 'RegionController@load');
route::get('/regions/create/' , 'RegionController@create');
route::post('/regions/store/' , 'RegionController@store');
route::get('/regions/edit/{id}' , 'RegionController@edit');
route::post('/regions/update/{id}' , 'RegionController@update');
route::get('/regions/destroy/{id}' , 'RegionController@destroy');
route::post('/regions/search/' , 'RegionController@search');
route::post('/regions/sort/' , 'RegionController@sort');

Route::get('/home', 'HomeController@index')->name('admin.home');

/*      Uploader Routes      */
Route::get('/uploader/filesUploader' , 'UploaderController@filesUploaderIndex');
Route::post('/uploader/filesUploader' , 'UploaderController@filesUploaderStore');
Route::post('/uploader/videoUploader' , 'UploaderController@videoUploaderStore');
Route::post('/editor/ckeditorUploader', 'UploaderController@ckeditorUploader')->name('ckeditor');
Route::get('/editor/ckeditor' , 'UploaderController@ckeditor');


/*      Pages Routes      */
route::get('/pages' , 'PageController@index');
route::get('/pages/load' , 'PageController@load');
route::get('/pages/create/' , 'PageController@create');
route::post('/pages/store/' , 'PageController@store');
route::get('/pages/edit/{id}' , 'PageController@edit');
route::post('/pages/update/{id}' , 'PageController@update');
route::get('/pages/destroy/{id}' , 'PageController@destroy');
route::post('/pages/search/' , 'PageController@search');
route::post('/pages/sort/' , 'PageController@sort');

/*      Blogs Routes      */
route::get('/blogs' , 'BlogController@index');
route::get('/blogs/load' , 'BlogController@load');
route::get('/blogs/create/' , 'BlogController@create');
route::post('/blogs/store/' , 'BlogController@store');
route::get('/blogs/edit/{id}' , 'BlogController@edit');
route::post('/blogs/update/{id}' , 'BlogController@update');
route::get('/blogs/destroy/{id}' , 'BlogController@destroy');
route::post('/blogs/search/' , 'BlogController@search');
route::post('/blogs/sort/' , 'BlogController@sort');


/*      Contacts Routes      */
route::get('/contacts' , 'ContactController@index');
route::get('/contacts/load' , 'ContactController@load');
route::get('/contacts/show/{id}' , 'ContactController@show');
route::get('/contacts/destroy/{id}' , 'ContactController@destroy');
route::post('/contacts/search/' , 'ContactController@search');
route::post('/contacts/sort/' , 'ContactController@sort');

/*      Faqs Routes      */
route::get('/faqs' , 'FaqController@index');
route::get('/faqs/load' , 'FaqController@load');
route::get('/faqs/create/' , 'FaqController@create');
route::post('/faqs/store/' , 'FaqController@store');
route::get('/faqs/edit/{id}' , 'FaqController@edit');
route::post('/faqs/update/{id}' , 'FaqController@update');
route::get('/faqs/destroy/{id}' , 'FaqController@destroy');
route::post('/faqs/search/' , 'FaqController@search');
route::post('/faqs/sort/' , 'FaqController@sort');

/*      Payments Routes      */
route::get('/payments' , 'PaymentController@index');
route::get('/payments/load' , 'PaymentController@load');
route::get('/payments/destroy/{id}' , 'PaymentController@destroy');
route::post('/payments/search/' , 'PaymentController@search');
route::post('/payments/sort/' , 'PaymentController@sort');
route::get('/payments/show/{id}' , 'PaymentController@show');


/*      Setting Routes      */
route::get('/settings' , 'SettingController@index');
route::get('/settings/load' , 'SettingController@load');
route::post('/settings/search/' , 'SettingController@search');
route::post('/settings/sort/' , 'SettingController@sort');
route::get('/settings/edit/{id}' , 'SettingController@edit');
route::post('/settings/update/{id}' , 'SettingController@update');

/*      Branch Routes      */
route::get('/branches' , 'BranchController@index');
route::get('/branches/load' , 'BranchController@load');
route::get('/branches/create/' , 'BranchController@create');
route::post('/branches/store/' , 'BranchController@store');
route::get('/branches/edit/{id}' , 'BranchController@edit');
route::post('/branches/update/{id}' , 'BranchController@update');
route::get('/branches/destroy/{id}' , 'BranchController@destroy');
route::post('/branches/search/' , 'BranchController@search');
route::post('/branches/sort/' , 'BranchController@sort');


/*      Order Routes      */
route::get('/orders' , 'OrderController@index');
route::get('/orders/load' , 'OrderController@load');
route::get('/orders/destroy/{id}' , 'OrderController@destroy');
route::post('/orders/search/' , 'OrderController@search');
route::post('/orders/sort/' , 'OrderController@sort');
route::get('/orders/show/{id}' , 'OrderController@show');

/*      Order Items Routes      */
route::get('/order-items' , 'OrderItemsController@index');
route::get('/order-items/load' , 'OrderItemsController@load');
route::get('/order-items/destroy/{id}' , 'OrderItemsController@destroy');
route::post('/order-items/search/' , 'OrderItemsController@search');
route::post('/order-items/sort/' , 'OrderItemsController@sort');
route::get('/order-items/show/{id}' , 'OrderItemsController@show');

/*      Invoice Routes      */
route::get('/invoices' , 'InvoiceController@index');
route::get('/invoices/load' , 'InvoiceController@load');
route::get('/invoices/destroy/{id}' , 'InvoiceController@destroy');
route::post('/invoices/search/' , 'InvoiceController@search');
route::post('/invoices/sort/' , 'InvoiceController@sort');
route::get('/invoices/show/{id}' , 'InvoiceController@show');
