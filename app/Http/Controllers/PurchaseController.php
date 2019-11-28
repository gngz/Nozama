<?php

namespace App\Http\Controllers;

use App\Image;
use App\Purchase;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseController extends Controller
{

    function add(Request $request,  Image $imageRepo) {
       // $path = $request->file('imageUpload')->store('images');
       
       $purchase = new Purchase();
       
       $purchase->title = $request->title;
       $purchase->description = $request->description;
       $purchase->max_price = $request->maxPrice;
       $purchase->min_price = $request->minPrice;
       $purchase->user_id = Auth::User()->id;

       

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
       

        dd( $purchase->id);
    }
    //
}
