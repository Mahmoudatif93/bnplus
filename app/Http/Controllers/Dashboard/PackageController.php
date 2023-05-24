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

use Carbon\Carbon;
class PackageController extends Controller
{
    public function index(Request $request)
    {



        $packages= package::when($request->search, function ($q) use ($request) {

            return $q->where('cobon_amount',  'like', '%' . $request->search . '%')
          
            ;

        })->latest()->paginate(5);
        $Companies = Company::all();
   // dd($cobons);
        return view('dashboard.packages.index', compact('packages','Companies'));

    }//end of index

    public function create()
    {
        $Companies = Company::all();
        return view('dashboard.packages.create', compact('Companies'));

    }//end of create

    public function store(Request $request)
    {

                $rules = [
                    'packages_amount' => 'required',
                    'package_name'=> 'required',
                    'package_number'=>'required'
                ];
                
                $request->validate($rules);
                $request_data = $request->all();
      
                if ($request->packages_image) {
       
                    Image::make($request->packages_image)
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('uploads/packages/' . $request->packages_image->hashName()));
        
                    $request_data['packages_image'] = 'https://bn-plus.ly/BNplus/public/uploads/packages/'.$request->packages_image->hashName();
        
                }//end of 
                
              package::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.packages.index');

    

    }//end of store





    public function edit($id )
    {
        $Companies = Company::all();
        $category=package::where('id',$id)->first();
     
        return view('dashboard.packages.edit', compact('category','Companies'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $category=package::where('id',$id)->first();


        $request_data = $request->except(['_token', '_method']);
  
        if ($request->packages_image) {

            if ($category->packages_image != '') {

                Storage::disk('public_uploads')->delete('/packages/' . $category->packages_image);

            }//end of if

            Image::make($request->packages_image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/packages/' . $request->packages_image->hashName()));

            $request_data['packages_image'] = 
            'https://bn-plus.ly/BNplus/public/uploads/packages/'.$request->packages_image->hashName();

        }//end of if

  $request_data['packages_amount']=$request->packages_amount;
    $request_data['package_number']=$request->package_number;
    $request_data['package_name']=$request->package_name;
   
   

        package::where('id',$id)->update($request_data);
      /*  $request_data22['package_id']=$id;
        Cobon::where('package_id',$id)->update($request_data22);*/
        
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.packages.index');

    }//end of update

    public function destroy(Request $request) 
    {
       
       
        Cobon::where('package_id',$request->card_id)->delete();
        $category=package::where('id',$request->card_id)->first();
    //    dd($category);
        if ($category->packages_image != '') {

            Storage::disk('public_uploads')->delete('/packages/' . $category->packages_image);

        }//end of if

        package::where('id',$request->card_id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.packages.index');

    }//end of destroy

 


    public function compniescards($id)
    {
        $cities = DB::table("cards")
                    ->where("company_id",$id)
                    ->get();
        return json_encode($cities);
    }

}//end of controller
