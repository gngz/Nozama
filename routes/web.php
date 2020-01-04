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

use App\Address;

Route::get('/', 'MainController@main');

Route::view('/about', 'about');
Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy');

Route::any('/', function (Request $request) {

    return view('api');
    
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::prefix('account')->middleware('auth')->group(function() {
    Route::get('/', 'Account\AccountController@index')->name('account');
    Route::get('/edit', 'Account\AccountController@edit')->name('editAccount');
    Route::post('/edit', 'Account\AccountController@editForm')->name('editAccountForm');
    Route::get('/movements', 'CreditController@movements')->name('viewMovements');
    addressPrefix();

});

Route::prefix('purchase')->group(function() {
   // Route::get('/', 'Account\AccountController@index')->name('account');
    Route::view('/create', 'purchase.create')->middleware('auth')->name('createPurchase');
    Route::get('/', 'PurchaseController@main')->middleware('auth')->name('viewPurchases');
    Route::get('/{id}', 'PurchaseController@purchase')->name('viewPurchase');;
    Route::get('/delete/{id}', 'PurchaseController@delete')->middleware('auth');
    Route::get('/edit/{id}', 'PurchaseController@viewEdit')->middleware('auth');
    Route::post('/edit/{id}', 'PurchaseController@edit')->middleware('auth');
    Route::post('/create', 'PurchaseController@add')->middleware('auth')->name('createPurchase');
    //Route::post('/edit', 'Account\AccountController@editForm')->name('editAccountForm');
});


Route::prefix('proposals')->group(function() {
     Route::get('/', 'ProposalController@main')->middleware('auth')->name('viewProposals');
     Route::get('/{id}', 'ProposalController@view')->middleware('auth')->name('viewProposal');
     Route::get('/make/{id}', 'ProposalController@make')->middleware('auth')->name('makeProposal');
     Route::post('/make/{id}', 'ProposalController@addProposal')->middleware('auth');
     Route::get('/delete/{id}', 'ProposalController@delete')->middleware('auth')->name('deleteProposal');

});

Route::prefix('profile')->group(function() {
    Route::get('/{id}', 'ProfileController@display')->name('viewProfile');
    Route::get('/contact/{id}', 'ProfileController@contact')->name('contactProfile')->middleware('auth');;
    Route::post('/contact/{id}', 'ProfileController@sendMail')->middleware('auth');;
    Route::get('/remove/{id}', 'ProfileController@remove')->name('removeAccount')->middleware('auth');;
    
});


Route::prefix('subcategory')->group(function() {
    Route::get('/{id}', 'CategoryController@subcategory')->name('viewSubcategory');
    
});


Route::prefix('category')->group(function() {
    Route::get('/{id}', 'CategoryController@view')->name('viewCategory');

});


Route::prefix('util')->group(function() {
    Route::get('/categories', 'UtilController@getCategories');
    Route::get('/subcategories/{id}', 'UtilController@getSubcategories');

});


Route::prefix('credit')->middleware('auth')->group(function() {
    Route::view('/add','credit.addcredit')->name('addCredit');
    Route::post('/confirm','CreditController@confirm')->name('creditConfirm');
    Route::get('/success/{id}', 'CreditController@success');
    Route::view('/cancel','credit.cancel');
});



Route::prefix('payment')->middleware('auth')->group(function() {
    Route::get('/address','PaymentController@setAddress')->name('paymentAddress');
    Route::post('/process','PaymentController@process')->name('processPayment');
    Route::get('/{id}','PaymentController@pay')->name('payProposal');
    Route::post('/{id}','PaymentController@confirm');
});





Route::prefix('search')->group(function() {
    Route::get('/', 'SearchController@search')->name('search');

});


function addressPrefix() {
    Route::prefix('address')->group(function() {
        Route::get('/', 'Address\AddressController@index')->name('addressList');

        //adicionar um novo endereço
        Route::get('/add', 'Address\AddressController@add')->name('addAddress');
        Route::post('/add', 'Address\AddressController@addAdress')->name('addNewAddress');

        //editar um endereço existente
        Route::get('/edit/{id}','Address\AddressController@edit')->name('editAddress');
        Route::post('/edit/{id}', 'Address\AddressController@editAddress')->name('editAddressForm');

        Route::get('/remove/{id}','Address\AddressController@remove')->name('removeAddress');


        //tornar endereço principal
        Route::get('/main/{id}', 'Address\AddressController@setMain')->name('mainAddress');
        
    });
}

