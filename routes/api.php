<?php

use App\Purchase;
use Illuminate\Http\Request;
use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    
    return response()->json( User::all());

});

Route::middleware('auth:api')->get('/purchases', function (Request $request) {
    
    $purchases = Purchase::all();

    return response()->json($purchases);
});



Route::middleware('auth:api')->get('/purchases/{id}', function (Request $request) {
    
    $purchase = Purchase::with('images')->find($request->id);

    if($purchase) {
        return response()->json($purchase);
    } else {
        return response()->json(["error" => "Purchase not found"],404);
    }
});


Route::middleware('auth:api')->post('/purchases/add', function (Request $request) {

});
