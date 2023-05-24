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

use App\Currsncyproducts;
use App\Carbon\Carbon;
class CurrProductsController extends Controller
{
    public function index(Request $request)
    {
  

        $Currsncyproducts = Currsncyproducts::when($request->search, function ($q) use ($request) {

            return $q->where('currancy',  'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
     
    //d
        return view('dashboard.Currsncyproducts.index', compact('Currsncyproducts'));

    }//end of index

    public function create()
    {
        $Currsncyproducts = Currsncyproducts::all();
        return view('dashboard.Currsncyproducts.create', compact('Currsncyproducts'));

    }//end of create

    public function store(Request $request)
    {

            $rules = [
                'currancy' => 'required'
            ];
            $request->validate($rules);
            $request_data = $request->all();
      
    Currsncyproducts::create($request_data);
          
     
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.Currsncyproducts.index');


    }//end of store




    public function edit($id )
    {
        $Currsncyproducts=Currsncyproducts::where('id',$id)->first();
  
        return view('dashboard.Currsncyproducts.edit', compact('Currsncyproducts'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $currancy=Currsncyproducts::where('id',$id)->first();
        $request_data = $request->except(['_token', '_method']);
  $request_data['currancy']=$request->currancy;

        Currsncyproducts::where('id',$id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.Currsncyproducts.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
        Currsncyproducts::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.Currsncyproducts.index');

    }//end of destroy




}//end of controller
