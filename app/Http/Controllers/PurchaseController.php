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

    
    

    function purchase(Request $request) {
        $user = Auth::User();

        $purchase = Purchase::find($request->id);


        
        if($purchase) {
            $images = $purchase->images();
            return view("purchase.view",["user" => $user,"purchase" =>  $purchase, "images" => $images]);
        } else {
            return redirect("/purchase");
        }
            
        

        
    }

    function delete(Request $request) {
        $user = Auth::User();
        $purchase = Purchase::find($request->id);


        if($purchase) {
            if($user->id == $purchase->user_id || $user->role == "admin") {
                $purchase->delete();
                return view("msg",["message" => "A compra foi eliminada"]);
            }else {
                return redirect("/purchase");
            }
        }

        return redirect("/purchase");

    }


    function viewEdit(Request $request) {

        $purchase = Purchase::find($request->id);
        $user = Auth::User();
        //dd($purchase);
        if($purchase) {
            if($user->id != $purchase->user_id) {
          
                return redirect("/purchase");
            }
            return view("purchase.create", ["purchase" => $purchase]);
        }
        
        
       
    }


    function edit(Request $request,  Image $imageRepo) {

      

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'max_price' => 'nullable|numeric',
            'min_price' => 'nullable|numeric',
            'category' => 'nullable|sometimes|numeric',
            'subcategory' => 'nullable|sometimes|numeric',
    
        ]);

        // TODO validar
       // $path = $request->file('imageUpload')->store('images');
       
       $user = Auth::User();
       $purchase = Purchase::find($request->id);

        if($purchase) {
            if($user->id != $purchase->user_id) {
          
                return redirect("/purchase");
            }
        }
       
       $purchase->title = $request->title;
       $purchase->description = $request->description;
       $purchase->max_price = $request->maxPrice;
       $purchase->min_price = $request->minPrice;
       $purchase->user_id = Auth::User()->id;
       

       if($request->category) {
        $purchase->category_id = $request->category;
        $purchase->subcategory_id = $request->subcategory;
       }
       
       

       $purchase->save();

       $cImages = $purchase->images;

       foreach($cImages as $image) {
        Storage::delete($image->path);
        $image->delete();
       }


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
       
       return redirect("/purchase/".$purchase->id);
       //return view("msg", ["message" => "A compra foi adicionada!"]);
       // dd( $purchase);
    }


    function add(Request $request,  Image $imageRepo) {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'max_price' => 'nullable|numeric',
            'min_price' => 'nullable|numeric',
            'category' => 'required|numeric',
            'subcategory' => 'required|numeric',
    
        ]);

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
       
       return redirect("/purchase/".$purchase->id);
       //return view("msg", ["message" => "A compra foi adicionada!"]);
       // dd( $purchase);
    }
    //
}
