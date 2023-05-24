<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cobonCompanies extends Model
{
    
        protected $fillable = ['company_id','cobon_id',
     'card_id'];


        protected $casts = [
               'id' => 'integer',
               'cobon_id'=> 'integer',
        'company_id' => 'integer',
 
           'card_id' => 'integer'
           
    ];
    
        public function companies()
    {
        return $this->belongsTo(Company::class,'company_id','id');

    }//end of companies
    
      public function cards()
    {
        return $this->belongsTo(Cards::class,'card_id','id');

    }//end of companies
    
       public function cobons()
    {
        return $this->belongsTo(Cobon::class,'cobon_id','id');

    }//end of package
    
}
