<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('status-products','StatusProductController');

Route::resource('category-products','CategoryProductController');

Route::resource('products','ProductController');

Route::resource('ref-banks','RefBankController');

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::resource('stores','StoreController');

Route::get('/my-store','StoreController@myStore')->name('my-store')->middleware('verified');

Route::resource('status-stores','StatusStoreController');

Route::resource('request-stores','RequestStoreController');

Route::POST('cancel-request','RequestStoreController@cancelRequest');

Route::get('{name}/products','OwnerProductController@index');

Route::resource('owner-products','OwnerProductController')->middleware('verified');

Route::get('/list-transactions/{id}','OwnerProductController@listTransaction')->middleware('verified');

Route::get('/checkout-detail','TransactionController@checkoutDetail')->middleware('verified');

Route::get('/upload-payment/{order_id}','TransactionController@payment')->middleware('verified');

Route::POST('/upload-payment/{id}','TransactionController@updatePayment')->middleware('verified');

Route::POST('confirm-payment','TransactionController@confirmPayment')->middleware('verified');

Route::get('buy/{name}','LandingPageController@buyProduct');

Route::POST('carts','CartController@addToCart');

Route::get('carts','CartController@index')->middleware('verified');

Route::POST('/update-quantity','CartController@toUpdateQuantity');

Route::get('checkout','CheckoutController@index')->middleware('verified');

Route::get("transactions",'TransactionController@index')->middleware('verified');

Route::get("transactions/{id}/show",'TransactionController@show')->middleware('verified');

Route::resource('user-types','UserTypeController');

Route::resource('user-status','UserStatusController');

Route::resource('user-profile','UserProfileController');

Route::resource('status-transactions','StatusTransactionController');

Route::POST('get-cities','RajaOngkirController@getCities');

Route::POST('get-subdistricts','RajaOngkirController@getSubdistricts');

Route::POST('estimate-cost','RajaOngkirController@estimateCost');

Route::get('/transactions-admin','TransactionController@indexAdmin');

Route::get('transactions-admin/{id}','TransactionController@detailTransaction');

Route::Post('status-transaction-update/{id}','TransactionController@statusTransaction');

Route::resource('reviews','ReviewController');

Route::resource('catalog-products','CatalogController');

Route::get('store/{name}','LandingPageController@searchByName');

Route::get('products-by/{category}','LandingPageController@searchByCategory');

Route::get('get-carts/{id_user}','CartController@getAllCartByUser');

Route::get('get-user','LandingPageController@getUser');

Route::Post('/search','LandingPageController@search');

Route::get('/test','RajaOngkirController@getProvinces');

Route::Post('/add-catalog/{id}','CatalogController@save');

Route::get('/list-catalog','CatalogController@list');

Route::Post('/products/discount/{id}','CatalogController@discount');

Route::resource('request-refund', 'RequestRefundController');
