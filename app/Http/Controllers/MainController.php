<?php

namespace App\Http\Controllers;

use App\Category;
use App\Purchase;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function main(Request $request) {

        $purchases = Purchase::latest()->take(5)->with('images')->get();



        $categories = Category::all();


        return view('welcome', ['purchases' => $purchases, 'categories' => $categories]);
    }
}
