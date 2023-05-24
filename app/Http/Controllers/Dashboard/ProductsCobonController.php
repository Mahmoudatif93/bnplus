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
use App\ProductsCobons;
use App\Carbon\Carbon;
class ProductsCobonController extends Controller
{
    public function index(Request $request)
    {
  

        $ProductsCobons = ProductsCobons::when($request->search, function ($q) use ($request) {

            return $q->where('cobon',  'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
     
    //d
        return view('dashboard.ProductsCobons.index', compact('ProductsCobons'));

    }//end of index

    public function create()
    {
        $ProductsCobons = ProductsCobons::all();
        return view('dashboard.ProductsCobons.create', compact('ProductsCobons'));

    }//end of create

    public function store(Request $request)
    {

            $rules = [
                'cobon' => 'required',
                  'amount' => 'required',
                'from_date' => 'required',
                'to_date' => 'required'
            ];
            $request->validate($rules);
            $request_data = $request->all();
      
    ProductsCobons::create($request_data);
          
     
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.ProductsCobons.index');


    }//end of store




    public function edit($id )
    {
        $ProductsCobons=ProductsCobons::where('id',$id)->first();
  
        return view('dashboard.ProductsCobons.edit', compact('ProductsCobons'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $category=ProductsCobons::where('id',$id)->first();
        $request_data = $request->except(['_token', '_method']);
  $request_data['cobon']=$request->cobon;
  $request_data['amount']=$request->amount;
  
    $request_data['to_date']=$request->to_date;
    $request_data['from_date']=$request->from_date;

        ProductsCobons::where('id',$id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.ProductsCobons.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
        ProductsCobons::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.ProductsCobons.index');

    }//end of destroy




}//end of controller
