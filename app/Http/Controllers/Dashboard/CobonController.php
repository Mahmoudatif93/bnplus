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
use App\cobonCompanies;
use App\Order;
use App\Cobon;
use App\package;
use App\Carbon\Carbon;
class CobonController extends Controller
{
    public function index(Request $request)
    {

//if(isset($request->search)){
    

        $cobons = Cobon::with('package')->when($request->search, function ($q) use ($request) {

            return $q->where('discount_percentage',  'like', '%' . $request->search . '%')
            ->orWhere('start_date', 'like', '%' . $request->search . '%')
            ->orWhere('end_date', 'like', '%' . $request->search . '%')
            ->orWhere('number_use', 'like', '%' . $request->search . '%')
            ->orWhere('cobon_type', 'like', '%' . $request->search . '%')
            ->groupBy('cobon_code')
            ;

        })->latest()->paginate(5);
/*}else{
    //  $cobons=Cobon::distinct('cobon_code')->get(['cobon_code']);


}*/
       
 // dd($cobons);
        $Companies = Company::all();
       
   //dd($cobons);
        return view('dashboard.cobons.index', compact('cobons','Companies'));

    }//end of index

    public function create()
    {
        $Companies = Company::all();
        $packages = package::all();
         $Complocal = Company::where('kind','local')->get();
          $Compnational = Company::where('kind','national')->get();
        return view('dashboard.cobons.create', compact('Companies','packages','Complocal','Compnational'));

    }//end of create

    public function store(Request $request)
    {
       

                $rules = [
                  'package_id'=> 'required',
                    'company_id' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                     'discount_percentage' => 'required',
                    'number_use' => 'required',
                   // 'card_id' => 'required',
                    'cobon_type' => 'required',
                    'cobon_code'=>'required'
                ];
               
                $request->validate($rules);
                $request_data = $request->all();


     $request_data['package_id']=$request->package_id;
         $request_data['start_date']=$request->start_date;
           $request_data['end_date']=$request->end_date;
        $request_data['discount_percentage']=$request->discount_percentage;
               $request_data['number_use']=$request->number_use;
                 $request_data['cobon_type']=$request->cobon_type;
                 $request_data['cobon_code']=$request->cobon_code;
            $lastcobon= Cobon::create($request_data);
        
            
 for($i=0;$i<count($request->company_id); $i++){
    
     if($request->company_id[$i]!=null){
                 $request_data2['card_id']=0;
                 $request_data2['cobon_id']=$lastcobon->id;
                 $request_data2['company_id']=$request->company_id[$i];
                
       cobonCompanies::create($request_data2);}
 }
      
  
            
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.cobons.index');

    

    }//end of store





    public function edit($id )
    {
        $category=Cobon::where('cobon_code',$id)->first();
       $Complocal = Company::where('kind','local')->get();
       $Companies = Company::all();
        $packages = package::all();
         $Compnational = Company::where('kind','national')->get();
        return view('dashboard.cobons.edit', compact('category','Companies','packages','Complocal','Compnational'));

    }//end of edit

    public function update(Request $request,$id)
    {
       
        $category=Cobon::where('id',$id)->first();
      //$request_data = $request->except(['_token', '_method']);



    $request_data['package_id']=$request->package_id;
         $request_data['start_date']=$request->start_date;
           $request_data['end_date']=$request->end_date;
        $request_data['discount_percentage']=$request->discount_percentage;
               $request_data['number_use']=$request->number_use;
                 $request_data['cobon_type']=$request->cobon_type;
                 $request_data['cobon_code']=$request->cobon_code;
                 
        Cobon::where('id',$id)->update($request_data);
        
        
     
                 
                 cobonCompanies::where('cobon_id',$id)->delete();
                 
                 
                  for($i=0;$i<count($request->company_id); $i++){
    
     if($request->company_id[$i]!=null){
                 $request_data2['card_id']=0;
                 $request_data2['cobon_id']=$id;
                 $request_data2['company_id']=$request->company_id[$i];
                
       cobonCompanies::create($request_data2);}
 }
 
                 
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.cobons.index');

    }//end of update

    public function destroy(Request $request) 
    {
        
       cobonCompanies::where('cobon_id',$request->card_id)->delete();  
   Cobon::where('id',$request->card_id)->delete();


        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.cobons.index');

    }//end of destroy

 


    public function compniescards($id)
    {
        
        $cities = DB::table("cards")
                    ->where("company_id",$id)
                    ->get();
        return json_encode($cities);
    }
    
    
    
        public function show($id)
    {
       
     $cards=    cobonCompanies::where('cobon_id',$id)->with('companies')->get();

     return view('dashboard.cobons.dubaiorderdetails', compact('cards'));



    }
    
    

}//end of controller
