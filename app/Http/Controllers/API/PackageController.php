<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\package;
use App\Packages_orders;
class PackageController extends Controller
{
      use ApiResourceTrait;
        public function packages()
    {
        $packages = package::where('active',0)->get();
        return $this->apiResponse($packages, 200);
    }
    
    
       public function Expiredpackages(Request $request)
    {
        
        if(!empty($request->client_id)){
             $packages = Packages_orders::where(array('active'=>1,'client_id'=>$request->client_id))->with('Packages')->get();
        return $this->apiResponse($packages, 200);
        }else{
        
             $packages = Packages_orders::where(array('active'=>1))->with('Packages')->get();
        return $this->apiResponse($packages, 200);
        }
       
    }
}
