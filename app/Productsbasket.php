<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productsbasket extends Model
{
           use SoftDeletes;


      protected $fillable = [
        'newproducts_id','client_id','amount','total_price','total_price_before'
       ];
       
       
       
           public function Newproducts()
    {
        return $this->belongsTo(Newproducts::class,'newproducts_id','id');

    }//end of cards
    
    
       
           public function ProductsOrderDetails()
    {
        return $this->hasMany(ProductsOrderDetails::class)->with('Newproducts');

    }//end of cards
    
    

    protected $casts = [
        'total_price' =>  'float(10,2)',
    ];
}
