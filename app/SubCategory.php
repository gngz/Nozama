<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    protected $hidden = [
        'category_id',
    ];

    protected $table = 'subcategories';
    public $timestamps = false;

    public function purchases()
    {
        return $this->hasMany('App\Purchase','subcategory_id','id');

    }
}
