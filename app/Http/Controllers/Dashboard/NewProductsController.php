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
use App\Newproducts;
use App\Catproducts;
use App\Carbon\Carbon;
use App\Currsncyproducts;
class NewProductsController extends Controller
{
    public function index(Request $request)
    {
 
        $Newproducts = Newproducts::when($request->search, function ($q) use ($request) {

            return $q->where('product_name',  'like', '%' . $request->search . '%')
            ->orWhere('product_link', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
        $Catproducts = Catproducts::all();
        return view('dashboard.Newproducts.index', compact('Newproducts','Catproducts'));

    }//end of index

    public function create()
    {
        $Catproducts = Catproducts::all();
        return view('dashboard.Newproducts.create', compact('Catproducts'));

    }//end of create

    public function store(Request $request)
    {
                $rules = [
                    'catproducts_id' => 'required',
                    'product_name' => 'required',
                    'product_link' => 'required',
                    'product_image' => 'required',
                    'product_sell' => 'required',
                    'Currancy' => 'required',
                    'Program_view' => 'required',
                ];
                
                $request->validate($rules);
                $request_data = $request->all();
      
                if ($request->product_image) {
       
                    Image::make($request->product_image)
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('uploads/products/' . $request->product_image->hashName()));
        
                    $request_data['product_image'] = 'https://bn-plus.ly/BNplus/public/uploads/products/'.$request->product_image->hashName();
        
                }//end of if
              
               
            $curproductss=  Currsncyproducts::first();
              if($request->Currancy=="1"){
                   $request_data['product_buy_d']='';
              $request_data['product_buy_E']=round(number_format($request->product_buy_E,2),2);
            $request_data['product_sell']=round(number_format($request->product_sell,2),2);
             $request_data['product_sell_do']=0;
            
              }
                if($request->Currancy=="2"){
                   
                   $request_data['product_buy_d']=number_format($request->product_buy_d,2) ;
              $request_data['product_buy_E']=round(number_format($request->product_buy_d * $curproductss->currancy ,2),2);
            $request_data['product_sell']=round(number_format($request->product_sell* $curproductss->currancy,2),2);
            $request_data['product_sell_do']=round(number_format($request->product_sell,2),2);
            
                  
              }
          //dd($request_data['product_sell']);
              
    
              Newproducts::create($request_data);
          
        
            session()->flash('success', __('New products Added'));
            return redirect()->route('dashboard.Newproducts.index');
         
    }//end of store




    public function edit($id )
    {
        $Catproducts = Catproducts::all();
        $Newproducts=Newproducts::where('id',$id)->first();

        return view('dashboard.Newproducts.edit', compact('Newproducts','Catproducts'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $category=Newproducts::where('id',$id)->first();


        $request_data = $request->except(['_token', '_method']);

        if ($request->product_image) {

            if ($category->product_image != '') {

                Storage::disk('public_uploads')->delete('/products/' . $category->product_image);

            }//end of if

            Image::make($request->product_image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/products/' . $request->product_image->hashName()));

            $request_data['product_image'] = 
            'https://bn-plus.ly/BNplus/public/uploads/products/'.$request->product_image->hashName();

        }//end of if

       $curproductss=  Currsncyproducts::first();
              if($request->Currancy=="1"){
                   $request_data['product_buy_d']='';
              $request_data['product_buy_E']=round(number_format($request->product_buy_E,2),2);
            $request_data['product_sell']=round(number_format($request->product_sell,2),2);
            $request_data['product_sell_do']=0;
            
              }
                if($request->Currancy=="2"){
                   
              $request_data['product_buy_d']=round(number_format($request->product_buy_d ,2),2);
              $request_data['product_buy_E']=round(number_format($request->product_buy_d * $curproductss->currancy,2),2) ;
            $request_data['product_sell']=round(number_format($request->product_sell* $curproductss->currancy,2),2);
            $request_data['product_sell_do']=round(number_format($request->product_sell,2),2);
                  
              }
             
          
              
        Newproducts::where('id',$id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.Newproducts.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
        
        $category=Newproducts::where('id',$request->card_id)->first();
    //    dd($category);
        if ($category->product_image != '') {

            Storage::disk('public_uploads')->delete('/products/' . $category->product_image);

        }//end of if

        Newproducts::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.Newproducts.index');

    }//end of destroy




    public function cmpanies($id)
    {
        if($id != 'all'){
              $cities = DB::table("companies")
                    ->where("kind",$id)
                    ->get();
        }else{
              $cities = DB::table("companies")
                    
                    ->get();
            
        }
      
        return json_encode($cities);
    }

}//end of controller
