<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    function user() {
        return $this->hasOne('App\User',"id","user_id");
    }

    function purchase() {
        return $this->belongsTo('App\Purchase');
     
    }

    function images() {
        return $this->hasMany('App\Image',"proposal_id", "id");
    }

}
