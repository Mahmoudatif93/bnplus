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

use App\Catproducts;
use App\Carbon\Carbon;
class C_productsController extends Controller
{
    public function index(Request $request)
    {
  

        $Catproducts = Catproducts::when($request->search, function ($q) use ($request) {

            return $q->where('category',  'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
     
    //d
        return view('dashboard.Catproducts.index', compact('Catproducts'));

    }//end of index

    public function create()
    {
        $Catproducts = Catproducts::all();
        return view('dashboard.Catproducts.create', compact('Catproducts'));

    }//end of create

    public function store(Request $request)
    {

            $rules = [
                'category' => 'required'
            ];
            $request->validate($rules);
            $request_data = $request->all();
      
    Catproducts::create($request_data);
          
     
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.Catproducts.index');


    }//end of store




    public function edit($id )
    {
        $Catproducts=Catproducts::where('id',$id)->first();
  
        return view('dashboard.Catproducts.edit', compact('Catproducts'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $category=Catproducts::where('id',$id)->first();
        $request_data = $request->except(['_token', '_method']);
  $request_data['category']=$request->category;

        Catproducts::where('id',$id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.Catproducts.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
        Catproducts::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.Catproducts.index');

    }//end of destroy




}//end of controller
