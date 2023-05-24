<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsCobons extends Model
{
     protected $fillable = [
        'cobon','from_date','to_date','amount'
       ];
}
