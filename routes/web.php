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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about');
Route::view('/terms', 'terms');


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::prefix('account')->middleware('auth')->group(function() {
    Route::get('/', 'Account\AccountController@index')->name('account');
    Route::get('/edit', 'Account\AccountController@edit')->name('editAccount');
    Route::post('/edit', 'Account\AccountController@editForm')->name('editAccountForm');
    addressPrefix();

});

Route::prefix('purchase')->group(function() { 
   // Route::get('/', 'Account\AccountController@index')->name('account');
    Route::view('/create', 'purchase.create')->middleware('auth')->name('createPurchase'); 
    Route::get('/', 'PurchaseController@main')->middleware('auth')->name('viewPurchases'); 
    Route::get('/{id}', 'PurchaseController@purchase'); 
    Route::get('/delete/{id}', 'PurchaseController@delete')->middleware('auth');
    Route::get('/edit/{id}', 'PurchaseController@viewEdit')->middleware('auth');
    Route::post('/edit/{id}', 'PurchaseController@edit')->middleware('auth');
    Route::post('/create', 'PurchaseController@add')->middleware('auth')->name('createPurchase'); 
    //Route::post('/edit', 'Account\AccountController@editForm')->name('editAccountForm'); 
});


Route::prefix('util')->group(function() {
    Route::get('/categories', 'UtilController@getCategories');
    Route::get('/subcategories/{id}', 'UtilController@getSubcategories');
});

function addressPrefix() {
    Route::prefix('address')->group(function() {
        Route::get('/', 'Address\AddressController@index')->name('addressList');
    });
}

