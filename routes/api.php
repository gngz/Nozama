<?php

use App\Category;
use App\Purchase;
use App\SubCategory;
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

    return response()->json($category);
});


Route::middleware('auth:api')->get('/category/{id}', function (Request $request) {
    
    $category = Category::with('subcategories')->find($request->id);

    return response()->json($category);
});

Route::middleware('auth:api')->get('/subcategory', function (Request $request) {
    
    $subcategory = SubCategory::all()->makeVisible(['category_id']);

    return response()->json($subcategory);
});


Route::middleware('auth:api')->get('/subcategory/{id}', function (Request $request) {
    
    $subcategory = SubCategory::find($request->id)->makeVisible(['category_id']);

    return response()->json($subcategory);
});


Route::middleware('auth:api')->post('/search', function (Request $request) {

    $query = $request->query('query');

    if(!$query) {
        $result = Purchase::simplePaginate(10);
    } else {
        $result = Purchase::where('title', 'like', '%'.$query.'%')
        ->simplePaginate(10);

    }

    return response()->json($result);
});
