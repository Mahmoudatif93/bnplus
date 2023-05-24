<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newproducts extends Model
{
            protected $fillable = ['product_name','catproducts_id','product_link',
     'product_image','product_buy_d','product_buy_E','product_sell','product_sell_do','Currancy','Program_view'];


        protected $casts = [
        'catproducts_id' => 'integer',
        'product_name' => 'string',
        'product_link' => 'string',
        'product_image' => 'string',
          'product_buy_d' => 'double',
          'product_buy_E' => 'double',
          //'product_sell' => 'double',
          'product_sell' => 'double',
          'product_sell_do' => 'double',
          'Currancy' => 'integer',
          'Program_view' => 'integer',
    ];
    

    
   
        public function Catproducts()
    {
        return $this->belongsTo(Catproducts::class);

    }//end of user



}
