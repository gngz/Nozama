<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    function category() {

       // dd($this->hasOne('App\Category',"id","category_id"));
        return $this->hasOne('App\Category',"id","category_id");
    }

    function subcategory() {

        // dd($this->hasOne('App\Category',"id","category_id"));
         return $this->hasOne('App\SubCategory',"id","subcategory_id");
     }

    function images() {
        return $this->hasMany('App\Image',"purchase_id", "id");
    }

    
    function proposals() {
        return $this->hasMany('App\Proposal',"purchase_id", "id");
    }


}
