<?php

namespace App\Http\Controllers\Dashboard;

use App\Company;
use App\Cards;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Imports\CardImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\NewProductsOrder;
use App\Packages_orders;
use Carbon\Carbon;
use App\Paymentcommissionsmodel;
class productprofits extends Controller
{
      public function index(Request $request)
    {
        
        
        
        if(isset($request->date1) && isset($request->date2)  ){
        
           $date1=$request->date1;
            $date2=$request->date2;
            $searc_id='paid';
            if($searc_id=='paid'){
                
                        $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->where('paid','true')->with('ClientAddress')->orderBy('id', 'DESC')->get();
                        


                
            }
            
           // dd($allprofits);
           else if($searc_id=='pinding'){
         $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->where('delevery',"no")->where('paid','true')->with('ClientAddress')->orderBy('id', 'DESC')->get();
                
            }
            
               else  if($searc_id=='deliverd'){
         $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->where('delevery',"yes")->where('paid','true')->with('ClientAddress')->orderBy('id', 'DESC')->get();
                
            }
            else if($searc_id=='not'){
                         $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->where('delevery',null)->where('paid','false')->orderBy('id', 'DESC')->with('ClientAddress')->get();

            }
               else if($searc_id=='can'){
                         $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->where('delevery',2)->with('ClientAddress')->orderBy('id', 'DESC')->get();

            }
      
      
     else if($searc_id=='all'){
                $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->with('ClientAddress')->orderBy('id', 'DESC')->get();

            }
      
            
        }else if(isset($request->date1) && isset($request->date2) && empty($request->searc_id) ){
        
        $date1=$request->date1 . '00:00:00';
            $date2=$request->date2. '00:00:00';
           
                $allprofits=NewProductsOrder::where('updated_at','>=' ,$date1)->where('updated_at','<=' ,$date2)->with('ClientAddress')->orderBy('id', 'DESC')->get();
        }
        
        else{
     $allprofits=NewProductsOrder::where('paid','true')->with('ClientAddress')->orderBy('id', 'DESC')->get();

            $date1="";
            $date2="";}
       
      //  dd();
        return view('dashboard.productprofits.index', compact('allprofits','date1','date2'));

    }//end of inde
    
    
    
        public function approve($id )
    {
    
         $request_data['delivey_status']='Delivered';
        $request_data['delevery']='1';
        NewProductsOrder::where('id',$id)->update($request_data);

        return redirect()->route('dashboard.ProductsReport.index');
    }
    
            public function disapprove($id )
    {
    
           $request_data['delivey_status']='Canceled';
        $request_data['delevery']='2';
        NewProductsOrder::where('id',$id)->update($request_data);
     
        return redirect()->route('dashboard.ProductsReport.index');
    }
    
    
          public function details($id )
    {
    
        
       $orders= NewProductsOrder::where('id',$id)->first();
        
     //   return  $or;

   return view('dashboard.ProductsReport.ProductsReportdetails', compact('orders'));
   
   //     return redirect()->route('dashboard.ProductsReportdetails.index')->with('orders',$orders);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
