<?php

namespace App\Http\Controllers\API;
use App\Paymentcommissionsmodel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\NewProductsOrder;
use App\Productsbasket;
use App\Client;
use App\Anaiscodes;
use App\cards_anais;
use App\Order_anais;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use PDF2;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB;
use DateTime;
use App\ProductsOrderDetails;
use Carbon\CarbonPeriod;
use App\ProductsDelivery;
class ProductsMoamalt extends Controller
{

    use ApiResourceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */







    public function reserveprodorder(Request $request)
    {
        $cardscount = Productsbasket::where(array('client_id' => $request->client_id))->count();
        
        $cards =Productsbasket::where(array('client_id' => $request->client_id,'deleted_at'=>NULL))->orderBy('id', 'desc')->get();
        
                  $amountpricesbefore=0;
            $amountprices = 0;   
    foreach($cards as $card){
        $amountprices += $card->total_price;   
         $amountpricesbefore += $card->total_price_before;  
    }
    
    
       
            $cobon=$request->cobon;
      if(isset($cobon)){
            $cobons= DB::select("select * FROM  products_cobons  where to_date >=NOW() and cobon ='$cobon'");
      if(count($cobons) > 0){
         $cobon_amt=$cobons[0]->amount;
     }else{
         $cobon_amt=0;
     }
     }else{
          $cobon_amt=0;
     }
     
       $deliveryfees=  ProductsDelivery::first();
      $dfees=$deliveryfees->delivery_fees;
      $amountprice=number_format(($amountprices - (($amountprices *$cobon_amt)/100)) + $dfees,2) ;
           
    
        if ($cardscount > 0) {
                       // $request_data['productsbaskets_id'] = $card->id;
                        $request_data['client_id'] = $request->client_id;
                        $request_data['total_price'] = $amountprice;
                        $request_data['total_price_before'] = $amountpricesbefore;
                        $request_data['client_name'] = $request->client_name;
                        $request_data['client_number'] = $request->client_number;
                        $request_data['paymenttype'] = "معاملات";
                          $request_data['client_addresses_id'] = $request->client_addresses_id;
                          
                        $order = NewProductsOrder::create($request_data);
                        
                           foreach($cards as $row){
                          $request_data2['productsbaskets_id'] = $row->id;
                             $request_data2['new_products_order_id'] = $order->id;
                         ProductsOrderDetails::create($request_data2);
                     }
                     
                        if ($order) {
                            $message = "product reserved ";
                            return $this->apiResponse6($cardscount - 1, $order->id, $message, 200);
                        } else {
                            return $this->apiResponse6(null, null, 'error to Reserve Order', 404);
                        }
        } else {
            $message = "No product Avaliable";
            return $this->apiResponse6($cardscount, null, $message, 404);
        }
    }

    public function clientpackorder(Request $request)
    {


        $order = NewProductsOrder::where(array('client_id' => $request->clientid,'paid'=>'true'))->first();
        
      
        if (!empty($order) ) {
            return $this->apiResponse($order, 'You have orders', 200);
        } else {
            return $this->apiResponse($order, 'No orders Avaliable', 200);
        }
    }




    public function finalrodorder(Request $request)
    {
 
 
 
        $id = $request->order_id;
        $order = NewProductsOrder::find($id);



        $dubiapi =  Productsbasket::where('id', $order->productsbaskets_id)->first();
        if (!empty($order)) {
            $is_expired = $order->created_at->addMinutes(5);
            if ($is_expired < \Carbon\Carbon::now()) {

                return response()->json(['status' => 'error']);
            } else {
                
                  $packcount = NewProductsOrder::where(array('client_id' => $order->client_id,'paid'=>'true'))->first();
               
                    
                $order->transaction_id = $request->transaction_id;
                $order->paid = 'true';
                $order->paymenttype = "معاملات";
                $clientdata =  Client::where('id', $order->client_id)->first();
                if ($order->update()) {  
                     Productsbasket::where(array('client_id' => $order->client_id))->delete();
                  
                    return response()->json(['status' => 'success']);
                } else {
                    return response()->json(['status' => 'error']);
                }
            }
        } else {
            return response()->json(['status' => 'error']);
        }
    }



    public function sendResetEmail($user, $content, $subject)
    {

        $send =   Mail::send(
            'dashboard.Contacts.content',
            ['user' => $user, 'content' => $content, 'subject' => $subject],
            function ($message) use ($user, $subject) {
                $message->to($user);
                $message->subject("$subject");
            }
        );
    }

    function generateHash($phone, $mail)
    {
        $email = strtolower($mail);
        $key = hash('sha256', 't-3zafRa');
        $time = time();
        return hash('sha256', $time . $email . $phone . $key);
    }


    function decryptSerial($encrypted_txt)
    {
        $secret_key = 't-3zafRa';
        $secret_iv = 'St@cE4eZ';
        $encrypt_method = 'AES-256-CBC';
        $key = hash('sha256', $secret_key);

        //iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning          
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($encrypted_txt), $encrypt_method, $key, 0, $iv);
    }


}
