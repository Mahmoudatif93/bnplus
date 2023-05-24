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
use App\package;
use App\Packages_orders;
use Carbon\Carbon;
use App\Paymentcommissionsmodel;
class PacagesprofitsController extends Controller
{
      public function index(Request $request)
    {
        
        
        
        if(isset($request->date1) && isset($request->date2) && !empty($request->package_id) ){
        
           $date1=$request->date1;
            $date2=$request->date2;
            $packageid=$request->package_id;
          $packordersmolat=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2'
          
          and package_id='$packageid'
          and paid='true' and paymenttype='معاملات'
          
      ");
       $packorderstdawal=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2'
          and package_id='$packageid'
          and paid='true' and paymenttype='تداول' 
          
          
          
      ");
      
          $packorderssdad=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2' 
          
          and package_id='$packageid'
          and paid='true' and paymenttype='سداد'
      ");
      
             $moamlat=  DB::select("
          select commissions from Paymentcommissions where  companyname='معاملات'
      ");
      
             $tdawa=  DB::select("
          select commissions from Paymentcommissions where  companyname='تداول'
      ");
      
              $sdad=  DB::select("
          select  commissions from Paymentcommissions where  companyname='سداد'
      ");
      
      
      $profitmoamlat= $packordersmolat[0]->amt -($packordersmolat[0]->amt * ($moamlat[0]->commissions/100)) ;
      
       $profittdawal= $packorderstdawal[0]->amt -($packorderstdawal[0]->amt * ($tdawa[0]->commissions/100)) ;
       
        $profitsadad= $packorderssdad[0]->amt -($packorderssdad[0]->amt * ($sdad[0]->commissions/100)) ;
      
      $allprofits=$profitmoamlat+$profittdawal+$profitsadad;
            
        }
        
        else if(isset($request->date1) && isset($request->date2) && empty($request->package_id)){
            
            
           $date1=$request->date1;
            $date2=$request->date2;
          $packordersmolat=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2'
          
          and paid='true' and paymenttype='معاملات'
          
      ");
       $packorderstdawal=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2'
          
          and paid='true' and paymenttype='تداول' 
          
          
          
      ");
      
          $packorderssdad=  DB::select("
          select sum(package_price) amt from packages_orders where CONVERT(`updated_at`, DATE) between '$date1' and '$date2' 
       
          and paid='true' and paymenttype='سداد'
      ");
      
             $moamlat=  DB::select("
          select commissions from Paymentcommissions where  companyname='معاملات'
      ");
      
             $tdawa=  DB::select("
          select commissions from Paymentcommissions where  companyname='تداول'
      ");
      
              $sdad=  DB::select("
          select  commissions from Paymentcommissions where  companyname='سداد'
      ");
      
      
      $profitmoamlat= $packordersmolat[0]->amt -($packordersmolat[0]->amt * ($moamlat[0]->commissions/100)) ;
      
       $profittdawal= $packorderstdawal[0]->amt -($packorderstdawal[0]->amt * ($tdawa[0]->commissions/100)) ;
       
        $profitsadad= $packorderssdad[0]->amt -($packorderssdad[0]->amt * ($sdad[0]->commissions/100)) ;
      
      $allprofits=$profitmoamlat+$profittdawal+$profitsadad;
            
        }
        
          else if(empty($request->date1) && empty($request->date2) && !empty($request->package_id)){
            
            
           $date1=$request->date1;
            $date2=$request->date2;
             $packageid=$request->package_id;
          $packordersmolat=  DB::select("
          select sum(package_price) amt from packages_orders where 
            package_id='$packageid'
          and paid='true' and paymenttype='معاملات'
          
      ");
       $packorderstdawal=  DB::select("
          select sum(package_price) amt from packages_orders where package_id='$packageid'
          and paid='true' and paymenttype='تداول' 
          
          
          
      ");
      
          $packorderssdad=  DB::select("
          select sum(package_price) amt from packages_orders where  package_id='$packageid'
          and paid='true' and paymenttype='سداد'
      ");
      
             $moamlat=  DB::select("
          select commissions from Paymentcommissions where  companyname='معاملات'
      ");
      
             $tdawa=  DB::select("
          select commissions from Paymentcommissions where  companyname='تداول'
      ");
      
              $sdad=  DB::select("
          select  commissions from Paymentcommissions where  companyname='سداد'
      ");
      
      
      $profitmoamlat= $packordersmolat[0]->amt -($packordersmolat[0]->amt * ($moamlat[0]->commissions/100)) ;
      
       $profittdawal= $packorderstdawal[0]->amt -($packorderstdawal[0]->amt * ($tdawa[0]->commissions/100)) ;
       
        $profitsadad= $packorderssdad[0]->amt -($packorderssdad[0]->amt * ($sdad[0]->commissions/100)) ;
      
      $allprofits=$profitmoamlat+$profittdawal+$profitsadad;
            
        }
        
        
        else{
            $allprofits="";
            $date1="";
            $date2="";
            
        }

 $packages = package::all();
        return view('dashboard.Pacagesprofits.index', compact('allprofits','date1','date2','packages'));

    }//end of inde
}
