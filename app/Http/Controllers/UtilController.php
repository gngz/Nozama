<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class UtilController extends Controller
{
    function getCategories(Category $categoriesRepo) {

        $categories = $categoriesRepo::all();

        return response()->json($categories);
    }

    function getSubcategories(Request $request ,Category $categoriesRepo) {

        $subcategories = $categoriesRepo::find($request->id)->subcategories;

        

        return response()->json($subcategories);
    }
}
