<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Cards;
class nationalcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $Companies = Company::where(array('api'=>0,'api2'=>0,'kind'=>'national'))->when($request->search, function ($q) use ($request) {

            return $q->where('name','like', '%' .  $request->search . '%')
                ->orWhere('kind', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);
        
        return view('dashboard.nationalcompany.index', compact('Companies'));
        
    }

    public function show($id)
    {
       
     $cards=   Cards::where(array('company_id'=>$id))->get();
     return view('dashboard.nationalcompany.dubaiorderdetails', compact('cards'));



    }

    public function disabledubioff($id)
    {
      
        $updatenational['enable']=1;
        Cards::where(array('company_id'=>$id,'purchase'=>0))->update($updatenational);
        Company::where(array('id'=>$id))->update($updatenational);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }
    
    public function enabledubioff($id)
    {
  
        $updatenational['enable']=0;
        Cards::where(array('company_id'=>$id,'purchase'=>0))->update($updatenational);
        Company::where(array('id'=>$id))->update($updatenational);
        return redirect()->back();
    }


    public function dubidisablecard($id)
    {
        
        $updatenational['enable']=1;
        Cards::where(array('id'=>$id,'purchase'=>0))->update($updatenational);
       
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }
    
    public function dubienablecard($id)
    {
        
        $updatenational['enable']=0;
        Cards::where(array('id'=>$id,'purchase'=>0))->update($updatenational);
      
        return redirect()->back();
    }


      public function purchesmanualna($id)
    {
      
        
        $updatenational['avaliable']=1;
         $updatenational['manual']=1;
          $updatenational['purchase']=1;
        Cards::where(array('id'=>$id))->update($updatenational);
       
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }
    
    
}
