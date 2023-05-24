<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currsncyproducts extends Model
{
        protected $fillable = ['currancy'];


        protected $casts = [
               'id' => 'integer',
        'currancy' => 'double'
        
    ];
}
