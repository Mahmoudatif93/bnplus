<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewProductsOrder extends Model
{
    protected $fillable = ['total_price_before','productsbaskets_id', 'client_id','transaction_id','total_price','paymenttype',
    'client_name','client_number','paid','invoice_no','process_id','sadadamout','city_id','client_addresses_id'/*'region_id','address_details'*/,'delivey_status','paymentdelev','delevery','delivery_date'];




        protected $casts = [

        'total_price' => 'double'
        
    ];
    
    
    public function ProductsOrderDetails()
    {
        return $this->hasMany(ProductsOrderDetails::class)->with('basket');

    }//end of cards

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');

    }//end of cards
    
     public function ClientAddress()
    {
        return $this->belongsTo(ClientAddress::class,'client_addresses_id','id');

    }//end of cards


}
