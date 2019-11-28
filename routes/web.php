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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::prefix('account')->middleware('auth')->group(function() { 
    Route::get('/', 'Account\AccountController@index')->name('account');
    Route::get('/edit', 'Account\AccountController@edit')->name('editAccount'); 
    Route::post('/edit', 'Account\AccountController@editForm')->name('editAccountForm'); 
    addressPrefix();

});


function addressPrefix() {
    Route::prefix('address')->group(function() {
        Route::get('/', function () {
            dd("xD");
        });
    });
}

