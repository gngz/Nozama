<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function view(Request $request) {

        $category = Category::find($request->id);
        
        if($category) {
            $subcategories = $category->subcategories;
            $purchases = $category->purchases()->paginate(10);
            return view('categories.view' , ["category" => $category,"purchases" => $purchases, "subcategories" => $subcategories]);

        }else {
            return redirect('/');
        }
       
    }

    function subcategory(Request $request) {
        $subcategory = SubCategory::find($request->id);

        if($subcategory) {
            $purchases = $subcategory->purchases()->paginate(10);
            return view('subcategories.view' , ["subcategory" => $subcategory ,"purchases" => $purchases]);

        } else {
            return redirect('/');
        }
        
    
    }
}
