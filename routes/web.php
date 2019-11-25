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
    Route::get('/', 'HomeController@index')->name('home');
    addressPrefix();

});


function addressPrefix() {
    Route::prefix('address')->group(function() {
        Route::get('/', function () {
            dd("xD");
        });
    });
}

