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
use App\ProductsDelivery;
use App\Carbon\Carbon;
class ProductsDeliveryController extends Controller
{
    public function index(Request $request)
    {
  

        $ProductsDelivery = ProductsDelivery::when($request->search, function ($q) use ($request) {

            return $q->where('delivery_fees',  'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
     
    //d
        return view('dashboard.ProductsDelivery.index', compact('ProductsDelivery'));

    }//end of index

    public function create()
    {
        $ProductsDelivery = ProductsDelivery::all();
        return view('dashboard.ProductsDelivery.create', compact('ProductsDelivery'));

    }//end of create

    public function store(Request $request)
    {

            $rules = [
                'delivery_fees' => 'required'
               
            ];
            $request->validate($rules);
            $request_data = $request->all();
      
    ProductsDelivery::create($request_data);
          
     
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.ProductsDelivery.index');


    }//end of store




    public function edit($id )
    {
        $ProductsDelivery=ProductsDelivery::where('id',$id)->first();
  
        return view('dashboard.ProductsDelivery.edit', compact('ProductsDelivery'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $category=ProductsDelivery::where('id',$id)->first();
        $request_data = $request->except(['_token', '_method']);
  $request_data['delivery_fees']=$request->delivery_fees;

        ProductsDelivery::where('id',$id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.ProductsDelivery.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
        ProductsDelivery::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.ProductsDelivery.index');

    }//end of destroy




}//end of controller
