<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    
    protected $fillable = ['city','region', 'address_details','address_phone'];

 
}
