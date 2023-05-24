<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\package;
use App\Anaiscodes;
use App\cards_anais;
use App\Packages_orders;
use DataTables;
use DB;
class packagessorders extends Controller
{
    public function index(Request $request)
    {
      



        $orders='';
       
        
        return view('dashboard.packagesorders.index', compact('orders'));

    }//end of index



    
    
       public function index2(Request $request)
    {
 

        
          if ($request->ajax()) {
            $data = Order::latest()->get();
           
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        
        
        return view('dashboard.orders.index');

    }//end of index
    
    
    
    public function pac_processing(Request $request)
{
    //to use parameter or variable sent from ajax view
    $params = $request->params;
 
    $whereClause = $params['sac'];

        
        
 $query = package::join('packages_orders','packages_orders.package_id','=','packages.id')
      ->select('packages_orders.client_name', 'packages_orders.client_number', 'packages_orders.package_price','packages.package_name', 'packages.packages_amount',  'packages.package_number','packages_orders.paid',
               'packages_orders.paymenttype' ,'packages_orders.endDate' ,'packages_orders.created_at')
               ->orderBy('packages_orders.created_at','desc');
      
return Datatables::eloquent($query)->make(true);


                      
                
             
    return DataTables::queryBuilder($query)->toJson();
 
}



    
    

}//end of controller
