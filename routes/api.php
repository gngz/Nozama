<?php

use App\Category;
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

Route::any('/', function (Request $request) {

    return view('api');
    
});

Route::middleware('auth:api')->name('getUsers')->get('/user', function (Request $request) {
    
    return response()->json( User::all());

});


Route::middleware('auth:api')->name('getUser')->get('/user/{id}', function (Request $request) {
    

    $user = User::find($request->id);

    if($user) {
        return response()->json($user);
    } else {
        return response()->json(["error" => "User not found"],404);
    }

});

Route::middleware('auth:api')->get('/purchase', function (Request $request) {
    
    $purchases = Purchase::all();

    return response()->json($purchases);
});



Route::middleware('auth:api')->get('/purchase/{id}', function (Request $request) {
    
    $purchase = Purchase::with('images')->find($request->id);

    if($purchase) {
        return response()->json($purchase);
    } else {
        return response()->json(["error" => "Purchase not found"],404);
    }
});

Route::middleware('auth:api')->get('/category', function (Request $request) {
    
    $category = Category::with('subcategories')->get();
    $category->subcategories->makeHidden('category_id');

    return response()->json($category);
});


