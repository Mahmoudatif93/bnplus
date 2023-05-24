<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tdawalPackDetails extends Model
{
        protected $table = 'tdawal_packdetails';

        protected $fillable = ['client_email','client_id','transaction_id','custom_ref','url','result','paid','amount','store_id','our_ref','payment_method','customer_phone','package_id','client_name','order_id','charges','net_amount'];
}
