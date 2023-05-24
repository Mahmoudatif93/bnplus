<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
          protected $fillable = ['package_name','packages_amount','packages_image','active'];
          
          
        protected $casts = [
               'id' => 'integer',
        'packages_image' => 'string',
        'package_name'=>'string',
        'packages_amount' => 'double',
        'package_number' => 'integer',
        'active'=>'integer',
         'created_at'=>'datetime:Y-m-d H:i:s',
         'updated_at'=>'datetime:Y-m-d H:i:s',
   
    ];
     
}
