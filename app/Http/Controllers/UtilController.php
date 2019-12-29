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

        
        $category = $categoriesRepo::find($request->id);
        $subcategories = array();

        if($category) {
            $subcategories = $category->subcategories;
        }

        return response()->json($subcategories);
    }
}
