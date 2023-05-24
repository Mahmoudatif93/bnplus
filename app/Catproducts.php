<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catproducts extends Model
{
    
        protected $fillable = ['category'];


        protected $casts = [
               'id' => 'integer',
        'category' => 'string'
        
    ];
}
