<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOrderDetails extends Model
{
     protected $fillable = ['productsbaskets_id', 'new_products_order_id'];



    public function basket()
    {
        return $this->belongsTo(Productsbasket::class,'productsbaskets_id')->withTrashed()->with('Newproducts');

    }//end of Productsbasket
    
    
    
    public function NewProductsOrder()
    {
        return $this->belongsTo(NewProductsOrder::class);

    }//end of cards
    
}
