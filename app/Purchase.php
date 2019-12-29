<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    function category() {

       // dd($this->hasOne('App\Category',"id","category_id"));
        return $this->hasOne('App\Category',"id","category_id");
    }
}
