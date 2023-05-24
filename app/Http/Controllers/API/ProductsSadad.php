<?php

namespace App\Http\Controllers\API;

use App\Paymentcommissionsmodel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\NewProductsOrder;
use App\Productsbasket;
use App\Anaiscodes;
use App\cards_anais;
use App\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\package;
use App\ProductsOrderDetails;
use DB;
use App\ProductsDelivery;
class ProductsSadad extends Controller
{
    use ApiResourceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function verifyproducts(Request $request)
    {  $cards = Productsbasket::where(array('client_id' => $request->client_id,'deleted_at'=>NULL))->orderBy('id', 'desc')->get();
    $amountprices = 0; 
    $amountpricesbefore=0;
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
                        
                        
    
        
        
                    $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjk3NTMxYzJkNDkzMjdhMzAwNmRjN2NiOTc4NTRlODFjMWMwYzVkYWMzN2UyNzhhZjViMjYyNmFmMTE5YjVjMDMxZTQzNGU0NDE3ODFlYjkiLCJpYXQiOjE2NDQzNTU0NjEsIm5iZiI6MTY0NDM1NTQ2MSwiZXhwIjoxNzcwNTg1ODYxLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.s0Yat6614IuR3jMJ0njo4-50DzfSjCd5tASebIDUyUP_O_wxFp4ed3av1Dari_xDv4OBn23wjoIURUOSkuVGSz84sLTbkWrv418CzZ-ygxXHeQoyZ-JUXGbk8-1A35SEJbBQdjPI8svlVs2UL_RTlQarZbDLDMtXH5heCsf3sf0nuK79zY_bhFFAZD882P3uViYnD-YcecRGFxjmxVz3vrShspwskg-kwM1sIrmLD95lRg7n7ZJItGCyaXDC27XJuVZUhmtCLA48iFBSBoTdk1NE_5pGiWn0UOzwvdbxWfKioQoeBrdP-wVJF9MDklahycPI4wN1ooKiSeeFL3xtBHSwjpk8GP1_y3UZZl99ANlR7j_jgKj8g_VH-w3m6I8dSTkbSvclBXY8joowgguOWkn4R3QV1hQtH4w-nf_14wV90hJE1O1NNEyQ3smidSSdQp0Qd_vlTqYOTgJPzlvkERxW-T2efJ9uM_TJFRPnXbSiLugC0AIIJw9GkBDAtUEhFKazYpRX4r45bOaOUKQtO65FFf_h40MBp-0DiTL6VIZX0X-jSxeAZ75ilBQVl7TUF_-zx5YsIN2xRLqgC97aqIe80rViUFARqWAQNQFCQFfe8Z7igpb0t4L49ZJ4JykktG03k53HZN4W2GZPOT2RdI2fgQVcytXza1VfXYmU2xo',
                        'X-API-KEY' => '984adf4c-44e1-418f-829b'
                    ])->post('https://api.plutus.ly/api/v1/transaction/sadadapi/verify', [
                        'mobile_number' => $request->mobile_number,
                        'birth_year' => $request->birth_year,
                        'amount' => $amountprice
                    ]);
                    
                   
                    if (!empty($cards)) {
                        if (isset($response['error'])) {
                            return $this->apiResponse4(false, $response['error']['message'], $response['error']['status']);
                        } else {
                            //foreach($cards as $card){
                            $process_id = $response['result']["process_id"];
                            //$request_data['productsbaskets_id'] = $card->id;
                            $sadadamout = $response['result']["amount"];
                            $request_data['sadadamout'] = $sadadamout;
                            $request_data['client_id'] = $request->client_id;
                            $request_data['total_price'] =$amountprice;
                               $request_data['total_price_before'] = $amountpricesbefore;
                            $request_data['client_name'] = $request->client_name;
                            $request_data['client_number'] = $request->client_number;
                            $request_data['process_id'] = $process_id;
                            $request_data['invoice_no'] = rand();
                            $request_data['paymenttype'] = "سداد";
                            $request_data['client_addresses_id'] = $request->client_addresses_id;
                             /*$request_data['city'] = $request->city;
                            $request_data['region'] = $request->region;
                             $request_data['address_details'] = $request->address_details;*/
                            
                            
                            $order = NewProductsOrder::create($request_data);
                            
                            foreach($cards as $row){
                          $request_data2['productsbaskets_id'] = $row->id;
                             $request_data2['new_products_order_id'] = $order->id;
                         ProductsOrderDetails::create($request_data2);
                     }
                            
                            //}
                            return $this->apiResponse5(true, $response['message'], $response['status'], $response['result'], $order->id);
                        }
                    } else {
                        return $this->apiResponse4(false, 'No Avaliable package', 400);
                    }
    }
    public function confirmproducts(Request $request)
    {
        $idfirst = $request->order_id;
        $orderfirst = NewProductsOrder::find($idfirst);
        if (!empty($orderfirst)) {
            $cards =   Productsbasket::where(array('id'=> $orderfirst->productsbaskets_id))->first();
            $allcompanyid = array();
           $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjk3NTMxYzJkNDkzMjdhMzAwNmRjN2NiOTc4NTRlODFjMWMwYzVkYWMzN2UyNzhhZjViMjYyNmFmMTE5YjVjMDMxZTQzNGU0NDE3ODFlYjkiLCJpYXQiOjE2NDQzNTU0NjEsIm5iZiI6MTY0NDM1NTQ2MSwiZXhwIjoxNzcwNTg1ODYxLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.s0Yat6614IuR3jMJ0njo4-50DzfSjCd5tASebIDUyUP_O_wxFp4ed3av1Dari_xDv4OBn23wjoIURUOSkuVGSz84sLTbkWrv418CzZ-ygxXHeQoyZ-JUXGbk8-1A35SEJbBQdjPI8svlVs2UL_RTlQarZbDLDMtXH5heCsf3sf0nuK79zY_bhFFAZD882P3uViYnD-YcecRGFxjmxVz3vrShspwskg-kwM1sIrmLD95lRg7n7ZJItGCyaXDC27XJuVZUhmtCLA48iFBSBoTdk1NE_5pGiWn0UOzwvdbxWfKioQoeBrdP-wVJF9MDklahycPI4wN1ooKiSeeFL3xtBHSwjpk8GP1_y3UZZl99ANlR7j_jgKj8g_VH-w3m6I8dSTkbSvclBXY8joowgguOWkn4R3QV1hQtH4w-nf_14wV90hJE1O1NNEyQ3smidSSdQp0Qd_vlTqYOTgJPzlvkERxW-T2efJ9uM_TJFRPnXbSiLugC0AIIJw9GkBDAtUEhFKazYpRX4r45bOaOUKQtO65FFf_h40MBp-0DiTL6VIZX0X-jSxeAZ75ilBQVl7TUF_-zx5YsIN2xRLqgC97aqIe80rViUFARqWAQNQFCQFfe8Z7igpb0t4L49ZJ4JykktG03k53HZN4W2GZPOT2RdI2fgQVcytXza1VfXYmU2xo',
                'X-API-KEY' => '984adf4c-44e1-418f-829b'
            ])->post('https://api.plutus.ly/api/v1/transaction/sadadapi/confirm', [
                'process_id' => $orderfirst->process_id,
                'code' => $request->code,
                'amount' => $orderfirst->sadadamout,
                'invoice_no' => $orderfirst->invoice_no
            ]);
            if (isset($response['error'])) {
                return $this->apiResponse4(false, $response['error']['message'], $response['error']['status']);
            } else {
                   $id = $request->order_id;
                     $order = NewProductsOrder::find($id);
                      $packcount = NewProductsOrder::where(array('client_id' => $order->client_id,'paid'=>'true'))->first();
                $order->transaction_id = $response['result']['transaction_id'];
                        $order->paid = 'true';
                  $order->paymenttype = "سداد";
                
                    if ($order->update()) {
                        
                    Productsbasket::where(array('client_id' => $order->client_id))->delete();
                
                        return $this->apiResponse5(true, 'success', 200, 'success', $order->id);
                    } else {
                        return response()->json(['status' => 'error']);
                    }
                }
        } else{
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
    
    
    
    //////////////////////////دفع عند الاستلام//////////////////////////
        public function verifyproductsdelivery(Request $request)
    {  
        $cards = Productsbasket::where(array('client_id' => $request->client_id,'deleted_at'=>NULL))->orderBy('id', 'desc')->get();
           $amountprices = 0;
           $amountpricesbefore= 0;
                    if (!empty($cards)) {
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
                        
                        
                           // $request_data['productsbaskets_id'] = $card->id;
                            $request_data['delivey_status'] = 'reserved';
                            $request_data['client_id'] = $request->client_id;
                            $request_data['delivery_date'] = $request->delivery_date;
                            $request_data['total_price'] = $amountprice;
                               $request_data['total_price_before'] = $amountpricesbefore;
                            $request_data['client_name'] = $request->client_name;
                            $request_data['client_number'] = $request->client_number;
                            $request_data['process_id'] = rand();
                            $request_data['invoice_no'] = rand();
                             $request_data['delevery'] = 0;
                            $request_data['paymenttype'] = "دفع عند الاستلام";
                            $request_data['delevery'] = 'no';
                           $request_data['paid'] = 'pending';
                             $request_data['delivey_status'] = 'pending';
                   $request_data['paymenttype']= "دفع عند الاستلام";
                   $request_data['paymentdelev'] = 1;
                   $request_data['client_addresses_id'] = $request->client_addresses_id;
                   $request_data['transaction_id']= rand();
                  /* $request_data['city'] = $request->city;
                            $request_data['region'] = $request->region;
                             $request_data['address_details'] = $request->address_details;*/
                            $order = NewProductsOrder::create($request_data);
                   
                   
                   
                   foreach($cards as $row){
                          $request_data2['productsbaskets_id'] = $row->id;
                             $request_data2['new_products_order_id'] = $order->id;
                         ProductsOrderDetails::create($request_data2);
                   }
                 //  dd($cards);
                  
                   
                   Productsbasket::where(array('client_id' => $request->client_id))->delete();
                            
                            
                            return $this->apiResponse5(true, 'تم الحجز', 200,'', $order->id);
                      
                    } else {
                        return $this->apiResponse4(false, 'No Avaliable product', 400);
                    }
    }
    
    
       public function confirmproductsdelivery(Request $request)
    {
        
        $idfirst = $request->order_id;
        $orderfirst = NewProductsOrder::find($idfirst);
        if (!empty($orderfirst)) {
                $id = $request->order_id;
                $order = NewProductsOrder::find($id);
                $order->transaction_id = rand();
                $order->paid = 'true';
                $order->delivey_status='pending';
                  $order->paymenttype = "دفع عند الاستلام";
                   $order->paymentdelev = 1;
                    if ($order->update()) {
                        return $this->apiResponse5(true, 'تم الدفع بنجاح في انتظار الموافقه ', 200, 'success', $order->id);
                    } else {
                        return response()->json(['status' => 'error']);
                    }
                
        } else{
            return response()->json(['status' => 'error']);
        }
        
    }

    
    
   ///////////////////////////////////////////////////////////////////// 
    
    
      public function clientorderprod(Request $request)
    {

       
      
      $tt='دفع عند الاستلام';
   // paymenttype
    $paid='pending';
      $a = NewProductsOrder::where(array('client_id' => $request->clientid, 'paid' => "true"));

$b = NewProductsOrder::where(array('client_id' => $request->clientid,
        'paid'=>'pending'))
->union($a)
->with('ProductsOrderDetails')
->orderBy('updated_at', 'DESC')->get();

$order = $b;


        if (count($order) > 0) {
            return $this->apiResponse($order, 'You have orders', 200);
        } else {
            return $this->apiResponse($order, 'No orders Avaliable', 200);
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
