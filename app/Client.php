<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laratrust\Traits\LaratrustUserTrait;
class Client extends Authenticatable implements JWTSubject
{
    protected $guarded = [];

    protected $fillable = ['id','name', 'phone','email','password'];

 
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get name attribute
    


  public function Packagesorder()
    {
        return $this->hasMany(Packages_orders::class,'client_id','id')->with('Packages');

    }//end of orders
    
    
    
    

}//end of model
