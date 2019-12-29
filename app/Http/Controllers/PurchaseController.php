<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Purchase;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseController extends Controller
{

    function main(Request $request) {

        $user = Auth::User();

        $purchases = $user->purchases()->paginate(10);
        //dd();
        return view("purchase.main",['purchases' => $purchases]);
    }

    function add(Request $request,  Image $imageRepo) {

        // TODO validar
       // $path = $request->file('imageUpload')->store('images');
       
       $purchase = new Purchase();
       
       $purchase->title = $request->title;
       $purchase->description = $request->description;
       $purchase->max_price = $request->maxPrice;
       $purchase->min_price = $request->minPrice;
       $purchase->user_id = Auth::User()->id;
       

       $purchase->category_id = $request->category;
       $purchase->subcategory_id = $request->subcategory;
       

       $purchase->save();


       if($request->hasFile('imageUpload'))
       {

           $files = $request->file('imageUpload');
           foreach ($files as $file) {
              $path =  $file->store('images');
              $image = new Image;
              
              $image->path = $path;
              $image->purchase_id = $purchase->id;
              $image->save();
           }
       }
       
       return view("msg");
       // dd( $purchase);
    }
    //
}
