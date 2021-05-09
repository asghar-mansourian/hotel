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

/*      User Routes      */
route::get('/users' , 'UserController@index');
route::get('/users/load' , 'UserController@load');
route::get('/users/create/', 'UserController@create');
route::post('/users/store/', 'UserController@store');
route::get('/users/edit/{id}', 'UserController@edit');
route::post('/users/update/{id}', 'UserController@update');
route::get('/users/destroy/{id}', 'UserController@destroy');
route::get('/users/show/{id}', 'UserController@show');
route::post('/users/search/', 'UserController@search');
route::post('/users/sort/', 'UserController@sort');


/*      Country Details Routes      */
route::get('/countries/details', 'CountryDetailController@index');
route::get('/countries/details/create', 'CountryDetailController@create');
route::post('/countries/details/store/', 'CountryDetailController@store');
route::get('/countries/details/edit/{id}', 'CountryDetailController@edit');
route::post('/countries/details/update/{id}', 'CountryDetailController@update');
route::get('/countries/details/destroy/{id}', 'CountryDetailController@destroy');
route::post('/countries/details/search/', 'CountryDetailController@search');
route::post('/countries/details/sort/', 'CountryDetailController@sort');
route::get('/countries/details/load', 'CountryDetailController@load');


/*      Country Routes      */
route::get('/countries', 'CountryController@index');
route::get('/countries/load', 'CountryController@load');
route::get('/countries/create/', 'CountryController@create');
route::post('/countries/store/', 'CountryController@store');
route::get('/countries/edit/{id}', 'CountryController@edit');
route::post('/countries/update/{id}', 'CountryController@update');
route::get('/countries/destroy/{id}', 'CountryController@destroy');
route::post('/countries/search/', 'CountryController@search');
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

/*      stocks Routes      */
route::get('/stocks' , 'StockController@index');
route::get('/stocks/load' , 'StockController@load');
route::get('/stocks/create/' , 'StockController@create');
route::post('/stocks/store/' , 'StockController@store');
route::get('/stocks/edit/{id}' , 'StockController@edit');
route::post('/stocks/update/{id}' , 'StockController@update');
route::get('/stocks/destroy/{id}' , 'StockController@destroy');
route::post('/stocks/search/' , 'StockController@search');
route::post('/stocks/sort/' , 'StockController@sort');

/*      Sliders Routes      */
route::get('/sliders' , 'SliderController@index');
route::get('/sliders/load' , 'SliderController@load');
route::get('/sliders/create/' , 'SliderController@create');
route::post('/sliders/store/' , 'SliderController@store');
route::get('/sliders/edit/{id}' , 'SliderController@edit');
route::post('/sliders/update/{id}' , 'SliderController@update');
route::get('/sliders/destroy/{id}' , 'SliderController@destroy');
route::post('/sliders/search/' , 'SliderController@search');
route::post('/sliders/sort/' , 'SliderController@sort');


/*      Contacts Routes      */
route::get('/contacts' , 'ContactController@index');
route::get('/contacts/load' , 'ContactController@load');
route::get('/contacts/show/{id}' , 'ContactController@show');
route::get('/contacts/destroy/{id}' , 'ContactController@destroy');
route::post('/contacts/search/' , 'ContactController@search');
route::post('/contacts/sort/' , 'ContactController@sort');

/*      Faqs Routes      */
route::get('/faqs', 'FaqController@index');
route::get('/faqs/load', 'FaqController@load');
route::get('/faqs/create/', 'FaqController@create');
route::post('/faqs/store/', 'FaqController@store');
route::get('/faqs/edit/{id}', 'FaqController@edit');
route::post('/faqs/update/{id}', 'FaqController@update');
route::get('/faqs/destroy/{id}', 'FaqController@destroy');
route::post('/faqs/search/', 'FaqController@search');
route::post('/faqs/sort/', 'FaqController@sort');


/*      cancel-reason-orders Routes      */
route::get('/cancel-reason-orders', 'CancelReasonOrderController@index');
route::get('/cancel-reason-orders/load', 'CancelReasonOrderController@load');
route::get('/cancel-reason-orders/create/', 'CancelReasonOrderController@create');
route::post('/cancel-reason-orders/store/', 'CancelReasonOrderController@store');
route::get('/cancel-reason-orders/edit/{id}', 'CancelReasonOrderController@edit');
route::post('/cancel-reason-orders/update/{id}', 'CancelReasonOrderController@update');
route::get('/cancel-reason-orders/destroy/{id}', 'CancelReasonOrderController@destroy');
route::post('/cancel-reason-orders/search/', 'CancelReasonOrderController@search');
route::post('/cancel-reason-orders/sort/', 'CancelReasonOrderController@sort');

/*      Payments Routes      */
route::get('/payments', 'PaymentController@index');
route::get('/payments/load', 'PaymentController@load');
route::get('/payments/destroy/{id}', 'PaymentController@destroy');
route::post('/payments/search/', 'PaymentController@search');
route::post('/payments/sort/', 'PaymentController@sort');
route::get('/payments/show/{id}', 'PaymentController@show');


/*      Setting Routes      */
route::get('/settings' , 'SettingController@index');
route::get('/settings/load' , 'SettingController@load');
route::post('/settings/search/' , 'SettingController@search');
route::post('/settings/sort/' , 'SettingController@sort');
route::get('/settings/edit/{id}' , 'SettingController@edit');
route::post('/settings/update/{id}' , 'SettingController@update');


/*      Setting Routes      */
route::get('/notifications' , 'NotificationController@index');
route::get('/notifications/load' , 'NotificationController@load');
route::post('/notifications/search/' , 'NotificationController@search');
route::post('/notifications/sort/' , 'NotificationController@sort');
route::get('/notifications/edit/{id}' , 'NotificationController@edit');
route::post('/notifications/update/{id}' , 'NotificationController@update');

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
route::get('/orders/status/{id}/{type}' , 'OrderController@status');

/*      Order Items Routes      */
route::get('/order-items', 'OrderItemsController@index');
route::get('/order-items/load', 'OrderItemsController@load');
route::get('/order-items/destroy/{id}', 'OrderItemsController@destroy');
route::post('/order-items/search/', 'OrderItemsController@search');
route::post('/order-items/sort/', 'OrderItemsController@sort');
route::get('/order-items/show/{id}', 'OrderItemsController@show');
route::get('/order-items/edit/{id}/{type}', 'OrderItemsController@edit');
route::post('/order-items/update/{id}', 'OrderItemsController@update');
route::post('/order-items/update/{id}', 'OrderItemsController@update');

route::get('/print-factor/{barcode}/{factor_id}', 'FactorPrintController@printFactorWarehouseAbroad');

/*      Invoice Routes      */
route::get('/invoices', 'InvoiceController@index');
route::get('/invoices/load', 'InvoiceController@load');
route::get('/invoices/destroy/{id}', 'InvoiceController@destroy');
route::post('/invoices/search/', 'InvoiceController@search');
route::post('/invoices/sort/', 'InvoiceController@sort');
route::post('/invoices/update/{id}', 'InvoiceController@update');
route::get('/invoices/show/{id}', 'InvoiceController@show');
route::get('/invoices/status/{id}/{type}', 'InvoiceController@status');
route::get('/invoices/status/{id}/{type}', 'InvoiceController@status');
Route::get('/invoices/file/{invoice}', 'InvoiceController@showFile')->name('invoices.show_file');


/*      Calculator Routes      */
route::get('/calculatores', 'CalculatorController@index');
route::get('/calculatores/load', 'CalculatorController@load');
route::get('/calculatores/create/', 'CalculatorController@create');
route::post('/calculatores/store/', 'CalculatorController@store');
route::get('/calculatores/edit/{id}', 'CalculatorController@edit');
route::post('/calculatores/update/{id}', 'CalculatorController@update');
route::get('/calculatores/destroy/{id}', 'CalculatorController@destroy');
route::post('/calculatores/search/', 'CalculatorController@search');
route::post('/calculatores/sort/', 'CalculatorController@sort');

//Inquiry
route::get('/inquiry', 'InquiryController@index');
route::get('/inquiry-show/{id}', 'InquiryController@show')->name('admin_inquiry_show');
route::post('/inquiry-store', 'InquiryController@store')->name('admin_inquiry_store');


//boxes
route::get('/boxes', 'BoxController@index');
route::get('/boxes/create', 'BoxController@create');
route::post('/boxes/store', 'BoxController@store');
route::get('/boxes/edit/{id}', 'BoxController@edit');
route::post('/boxes/update/{id}', 'BoxController@update');
route::get('/boxes/show/{id}', 'BoxController@show');
route::get('/boxes/destroy/{id}', 'BoxController@delete');
route::post('boxes/search', 'BoxController@search');
route::get('/boxes/status/{id}/{type}', 'BoxController@status');
route::post('/boxes/createXml', 'BoxController@createXml');
route::post('/boxes/createExport', 'BoxController@createExport');

//boxes items
route::delete('/box-items/destroy/{id}', 'BoxItemController@delete');


//Customers
route::get('/customers', 'CustomerController@index');
route::get('/customers/create', 'CustomerController@create');
route::post('/customers/store', 'CustomerController@store');
route::get('/customers/edit/{id}', 'CustomerController@edit');
route::post('/customers/update/{id}', 'CustomerController@update');
route::get('/customers/destroy/{id}', 'CustomerController@delete');
route::post('customers/search', 'CustomerController@search');

//Customers group
route::get('/customer-groups', 'CustomerGroupController@index');
route::get('/customer-groups/create', 'CustomerGroupController@create');
route::post('/customer-groups/store', 'CustomerGroupController@store');
route::get('/customer-groups/edit/{id}', 'CustomerGroupController@edit');
route::post('/customer-groups/update/{id}', 'CustomerGroupController@update');
route::get('/customer-groups/destroy/{id}', 'CustomerGroupController@delete');
route::post('customer-groups/search', 'CustomerGroupController@search');



/*      Country Details Routes      */
route::get('/price-items', 'PriceItemController@index');
route::get('/price-items/create', 'PriceItemController@create');
route::post('/price-items/store/', 'PriceItemController@store');
route::get('/price-items/edit/{id}', 'PriceItemController@edit');
route::post('/price-items/update/{id}', 'PriceItemController@update');
route::get('/price-items/destroy/{id}', 'PriceItemController@destroy');
route::post('/price-items/search/', 'PriceItemController@search');
route::post('/price-items/sort/', 'PriceItemController@sort');
route::get('/price-items/load', 'PriceItemController@load');


//Customers
route::get('/couriers', 'CourierController@index');
route::get('/couriers/create', 'CourierController@create');
route::post('/couriers/store', 'CourierController@store');
route::get('/couriers/edit/{id}', 'CourierController@edit');
route::post('/couriers/update/{id}', 'CourierController@update');
route::get('/couriers/destroy/{id}', 'CourierController@delete');
route::get('/couriers/show/{id}', 'CourierController@show');
route::post('/couriers/search', 'CourierController@search');

//custom scripts
route::get('/scripts/index', 'ScriptController@index');
route::get('/scripts/create', 'ScriptController@create');
route::post('/scripts/store', 'ScriptController@store');
route::get('/scripts/edit/{id}', 'ScriptController@edit');
route::post('/scripts/update/{id}', 'ScriptController@update');
route::get('/scripts/destroy/{id}', 'ScriptController@destroy');
route::get('/scripts/show/{id}', 'ScriptController@show');
route::post('/scripts/search', 'ScriptController@search');


/*      Admin Routes      */
route::get('/admins', 'AdminController@index');
route::get('/admins/load', 'AdminController@load');
route::get('/admins/create/', 'AdminController@create');
route::post('/admins/store/', 'AdminController@store');
route::get('/admins/edit/{id}', 'AdminController@edit');
route::post('/admins/update/{id}', 'AdminController@update');
route::get('/admins/destroy/{id}', 'AdminController@destroy');
route::get('/admins/assign_role/{id}', 'AdminController@assignRole');
route::post('/admins/assign_role/{id}', 'AdminController@assignRoleAdmin');
route::post('/admins/search/', 'AdminController@search');
route::post('/admins/sort/', 'AdminController@sort');

Route::get('/storage/{id}', '\App\Http\Controllers\Member\ImageController@show')->name('admin_storage_image');

/*      Roles Routes      */
route::get('/roles', 'RoleController@index');
route::get('/roles/load', 'RoleController@load');
route::get('/roles/create/', 'RoleController@create');
route::post('/roles/store/', 'RoleController@store');
route::get('/roles/edit/{id}', 'RoleController@edit');
route::post('/roles/update/{id}', 'RoleController@update');
route::get('/roles/destroy/{id}', 'RoleController@destroy');
route::get('/roles/show/{id}', 'RoleController@show');
route::post('/roles/search/', 'RoleController@search');
route::post('/roles/sort/', 'RoleController@sort');

/*      Permission Routes      */
route::get('/permissions', 'PermissionController@index');
route::get('/permissions/load', 'PermissionController@load');
route::get('/permissions/create/', 'PermissionController@create');
route::post('/permissions/store/', 'PermissionController@store');
route::get('/permissions/edit/{id}', 'PermissionController@edit');
route::post('/permissions/update/{id}', 'PermissionController@update');
route::get('/permissions/destroy/{id}', 'PermissionController@destroy');
route::post('/permissions/search/', 'PermissionController@search');
route::post('/permissions/sort/', 'PermissionController@sort');


/*      Create Invoice Routes By Admin     */
route::get('/admin-invoices' , 'AdminInvoicesController@index');
route::get('/admin-invoices/load' , 'AdminInvoicesController@load');
route::get('/admin-invoices/create/' , 'AdminInvoicesController@create');
route::post('/admin-invoices/store/' , 'AdminInvoicesController@store');
route::get('/admin-invoices/edit/{id}' , 'AdminInvoicesController@edit');
route::post('/admin-invoices/update/{id}' , 'AdminInvoicesController@update');
route::get('/admin-invoices/destroy/{id}' , 'AdminInvoicesController@destroy');
route::post('/admin-invoices/search/' , 'AdminInvoicesController@search');
route::post('/admin-invoices/sort/' , 'AdminInvoicesController@sort');

//how we work
route::get('/how_we_work','HowWeWorkController@index');
route::get('/how_we_work/create','HowWeWorkController@create');
route::post('/how_we_work/store','HowWeWorkController@store');
route::get('/how_we_work/edit/{id}','HowWeWorkController@edit');
route::post('/how_we_work/update/{id}','HowWeWorkController@update');
route::get('/how_we_work/destroy/{id}','HowWeWorkController@destroy');
route::post('/how_we_work/search','HowWeWorkController@search');

//customer_reviews
route::get('/customer_reviews','CustomerReviewController@index');
route::get('/customer_reviews/create','CustomerReviewController@create');
route::post('/customer_reviews/store','CustomerReviewController@store');
route::get('/customer_reviews/edit/{id}','CustomerReviewController@edit');
route::post('/customer_reviews/update/{id}','CustomerReviewController@update');
route::get('/customer_reviews/destroy/{id}','CustomerReviewController@destroy');
route::post('/customer_reviews/search','CustomerReviewController@search');


