<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages_orders extends Model
{
     protected $fillable = ['package_id', 'client_id','transaction_id','package_price','paymenttype','client_name','client_number','paid','invoice_no','process_id','sadadamout','endDate','active'];

        protected $casts = [

        'package_price' => 'double',
        'endDate'=>'datetime:Y-m-d H:i:s',
         'created_at'=>'datetime:Y-m-d H:i:s',
         'updated_at'=>'datetime:Y-m-d H:i:s',
        
    ];
    
       public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');

    }//end of client
    
           public function Packages()
    {
        return $this->hasOne(package::class,'id','package_id');

    }//end of client
    
    
    
    
}
