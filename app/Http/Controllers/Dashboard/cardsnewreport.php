<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Cards;
use App\Anaiscodes;
use App\cards_anais;
use App\Order_anais;
use DataTables;
use DB;
class cardsnewreport extends Controller
{
    public function index(Request $request)
    {
        
        
        if( !empty($request->date1) && !empty($request->date2)  ){
            
            $date1=$request->date1;
            $date2=$request->date2;
            $searc_id= 'true';
   $orders=DB::select("
select * FROM orders
left outer join cards
on orders.card_id=cards.id
WHERE orders.paid = '$searc_id' AND orders.updated_at BETWEEN '$date1' AND '$date2'
order by orders.updated_at
");
              //  dd($orders);
               
               
        }else{
                       $searc_id= 'true';
   $orders="";
        }
      




       // dd($orders);
       
       $allprofits='';
        
        return view('dashboard.cardsreports.index', compact('orders','allprofits'));

    }//end of index

    public function products(Order $order)
    {
       // $products = $order->cards;
     
    $products =  Cards::where('id',$order->card_id)->first();
        /*foreach ($products as $product){
            $company=  \App\Company::where(['id' => $product->company_id])->first();
             }*/
        
  

        return view('dashboard.orders._products', compact('order', 'products'));

    }//end of products
    
    public function destroy(Order $order)
    {
   

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');
    
    }//end of order
    
    
    
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
    
    
    
    public function ss_processing(Request $request)
{
    //to use parameter or variable sent from ajax view
    $params = $request->params;
 
    $whereClause = $params['sac'];
 
 
 
   // $query = DB::table('orderallfinal')->orderBy('created_at','desc');
      
 
 
 
 
    
                
                
        
        
        $query = Order::join('cards','orders.card_id','=','cards.id')
                             ->join('companies','cards.company_id','=','companies.id')
      ->select('orders.client_name', 'orders.client_number', 'orders.card_price','cards.card_name', 'cards.card_code',  'companies.name','orders.paid','orders.cobon_code',
               'orders.paymenttype' ,'orders.created_at')
               ->orderBy('orders.created_at','desc');
      
return Datatables::eloquent($query)->make(true);


                      
                
             
    return DataTables::queryBuilder($query)->toJson();
 
}



    
    

}//end of controller
