<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function view(Request $request) {

        $category = Category::find($request->id);
        $purchases = $category->purchases()->paginate(10);

        return view('categories.view' , ["category" => $category,"purchases" => $purchases]);
    }
}
