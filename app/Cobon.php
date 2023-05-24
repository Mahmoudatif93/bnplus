<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobon extends Model
{
    

        protected $fillable = ['package_id',
     'start_date','end_date','discount_percentage','number_use'/*,'company_id','card_id'*/,'cobon_type','active','cobon_code'];


        protected $casts = [
               'id' => 'integer',
               'package_id'=> 'integer',
        'cobon_image' => 'string',
        //'company_id' => 'integer',
        'cobon_code' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
         'discount_percentage' => 'double',
          'number_use' => 'integer',
          // 'card_id' => 'integer',
            'cobon_type' => 'string',
            'active'=>'integer'
    ];
    
      /*  public function companies()
    {
        return $this->belongsTo(Company::class,'company_id','id');

    }//end of companies*/
    
      public function cards()
    {
        return $this->belongsTo(Cards::class,'card_id','id');

    }//end of companies
    
       public function package()
    {
        return $this->belongsTo(package::class,'package_id','id');

    }//end of package
    
    
    
    
    
}
