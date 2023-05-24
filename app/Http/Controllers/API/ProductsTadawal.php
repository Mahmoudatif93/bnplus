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
use App\tdawalProdDetails;
use App\Order_anais;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use PDF2;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\package;
use App\ProductsOrderDetails;
use App\ProductsDelivery;
use DB;
class ProductsTadawal extends Controller
{

    use ApiResourceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function reserveProdtadalwal(Request $request)
    {
        
        $cardscount = Productsbasket::where(array('client_id' => $request->client_id))->count();
        $cards = Productsbasket::where(array('client_id' => $request->client_id,'deleted_at'=>NULL))->orderBy('id', 'desc')->get();
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
          
            $request_data['client_id'] = $request->client_id;
            $request_data['total_price'] = $amountprice;
            $request_data['total_price_before'] = $amountpricesbefore;
            $request_data['client_name'] = $request->client_name;
            $request_data['client_number'] = $request->client_number;
            $request_data['paymenttype'] = "تداول";
          /*  $request_data['city'] = $request->city;
            $request_data['region'] = $request->region;
            $request_data['address_details'] = $request->address_details;*/
             $request_data['client_addresses_id'] = $request->client_addresses_id;
            $order = NewProductsOrder::create($request_data);
            
                     foreach($cards as $row){
                          $request_data2['productsbaskets_id'] = $row->id;
                             $request_data2['new_products_order_id'] = $order->id;
                         ProductsOrderDetails::create($request_data2);
                     }
                     
                     
            if ($order) {
                $message = "products reserved ";
                return  $this->InitiatePaymenttly($request,$order->total_price, $order->id);
                return $this->apiResponse6($cardscount, $order->id, $message, 200);
            } else {
                return $this->apiResponse6(null, null, 'error to Reserve Order', 404);
            }
        } else {
            $message = "No products Avaliable";
            return $this->apiResponse6($cardscount, null, $message, 404);
        }
    }


    public function confirmProdkorders($client_id, $order_id, $client_email, $client_name, $customer_phone, $transaction_id, $payment_method)
    {

        $order = NewProductsOrder::find($order_id);
        $dubiapi =  Productsbasket::where('id', $order->productsbaskets_id)->first();
        if (!empty($order)) {
            $is_expired = $order->created_at->addMinutes(5);
            if ($is_expired < \Carbon\Carbon::now()) {
                return response()->json(['status' => 'error']);
            } else {
                
                
                    $packcount = NewProductsOrder::where(array('client_id' => $order->client_id,'paid'=>'true'))->first();
                
                      
                $order->transaction_id = $transaction_id;
                $order->paid = 'true';
                $order->paymenttype = $payment_method;
           
                
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


    /////////////////Tlyncapi/////////////////


    public function InitiatePaymenttly(Request $request,$amount, $order_id)
    {
        $custom_ref = rand();
        //$amount = $request->total_price;
        $phones = $request->client_number;
        $email = $request->client_email;
        $amountprice = $amount;
        $fronturl = url('api/fronturl');
        $backendurl = url('api/backendfunprod');
        if (substr($phones, 0, 6) == '+218 9') {
            $phone =  str_replace('+218 ', '', $phones);
        } else  if (substr($phones, 0, 6) == '+218 0') {
            $phone =  str_replace('+218 0', '', $phones);
        } else  if (substr($phones, 0, 5) == '+2189') {
            $phone =  str_replace('+218', '', $phones);
        } else  if (substr($phones, 0, 5) == '+2180') {
            $phone =  str_replace('+2180', '', $phones);
        } else  if (substr($phones, 0, 1) == '0') {
            $phone =  str_replace('0', '', $phones);
        } else {
            $phone =  $phones;
        }
        if (
            preg_match("~^2189\d+$~", $phone) || preg_match("~^9\d+$~", $phone) || preg_match("~^002189\d+$~", $phone)
            || preg_match("~^0021809\d+$~", $phone)   || preg_match("~^21809\d+$~", $phone)
        ) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://wla3xiw497.execute-api.eu-central-1.amazonaws.com/payment/initiate',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'id=pLAkv8XEQemV7wDM6ElodG24RnzXAKZVE49PjrN5Y8OgLBJ01xyqabvkpbo5Vq02&amount=' . $amountprice . '&phone=' . $phone . '&email=' . $email . '&backend_url=' . $backendurl . '
 &custom_ref=' . $custom_ref .
                    '&frontend_url=' . $fronturl . '',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Accept: application/json',
                    'Authorization: Bearer 1eoT4IqACu7X0iZvvUeoCbfF0PFlBSuNHVdF6Dzn'
                ),
            ));
            $response = curl_exec($curl);
            $json = json_decode($response, true);
            if (isset($json['errors'])) {
                return $this->apiResponsewebtaw($json['errors'], 404);
            } else {
                $request_data['result'] = $json['result'];
             //   $request_data['paid'] = $json['result'];
                $request_data['custom_ref'] =  $json['custom_ref'];
                $request_data['url'] = $json['url'];
                $request_data['productsbaskets_id'] = $request->productsbaskets_id;
                $request_data['order_id'] = $order_id;
                $request_data['amount'] = 1;
                $request_data['client_name'] = $request->client_name;
                $request_data['client_id'] = $request->client_id;
                $request_data['customer_phone'] = $request->client_number;
                $request_data['client_email'] = $request->client_email;
                $request_data['transaction_id'] = rand();


                $order = tdawalProdDetails::create($request_data);
                curl_close($curl);
                $webview = $json['url'];

                $message = "product reserved ";
                return $this->apiResponseweb($webview, $message, 200);
            }
        } else {
            return $this->apiResponse6(null, null, 'Enter Valid number', 404);
        }
    }



    public function transactionPayment(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://c7drkx2ege.execute-api.eu-west-2.amazonaws.com/receipt/transaction',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'store_id=' . $request->store_id . '&transaction_ref=' . $request->transaction_ref . '&custom_ref=' . $request->custom_ref . '',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
                'Authorization: Bearer 0r14CIjDO0MDErCakVQsoohAvvyklGUvbxUAXpXg'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    public function reservewebview($id)
    {


        return view('webview', compact('id'));
    }
    public function backendfunprod(Request $request)
    {
        $json = $request->all();
        $request_data['result'] = $json['result'];
        $request_data['amount'] = $json['amount'];
        $request_data['store_id'] = $json['store_id'];
        $request_data['our_ref'] = $json['our_ref'];
        $request_data['payment_method'] = $json['payment_method_en'];
        $request_data['customer_phone'] = $json['customer_phone'];
        $request_data['custom_ref'] = $json['custom_ref'];
        $request_data['charges'] = $json['charges'];
        $request_data['net_amount'] = $json['net_amount'];
       if ($json['result'] == 'success') {
            $request_data['paid'] = 'yes';
        }
        
     //   $request_data['paid'] = $json['result'];
        
        $order = tdawalProdDetails::where('custom_ref', $json['custom_ref'])->update($request_data);
        $orderdone = tdawalProdDetails::where(array('custom_ref' => $json['custom_ref'], 'paid' => 'yes'))->first();
        $payment_method = $request_data['payment_method'];
        $this->confirmProdkorders(
            $orderdone->client_id,
            $orderdone->order_id,
            $orderdone->client_email,
            $orderdone->client_name,
            $orderdone->customer_phone,
            $orderdone->transaction_id,
            $payment_method
        );
    }
}
