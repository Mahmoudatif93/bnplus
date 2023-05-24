<?php

namespace App\Http\Controllers\API;
use App\Paymentcommissionsmodel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Packages_orders;
use App\package;
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

use Carbon\CarbonPeriod;
class packagesMoamlat extends Controller
{

    use ApiResourceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */







    public function reservepackorder(Request $request)
    {
        $cardscount = package::where(array('id' => $request->package_id,'active'=>0))->count();
        
        $card = package::where(array('id' => $request->package_id,'active'=>0))->orderBy('id', 'desc')->first();
        
        if ($cardscount > 0) {
                        $request_data['package_id'] = $card->id;
                        $request_data['client_id'] = $request->client_id;
                        $request_data['package_price'] = $card->packages_amount;
                        $request_data['client_name'] = $request->client_name;
                        $request_data['client_number'] = $request->client_number;
                        $request_data['paymenttype'] = "معاملات";
                        $order = Packages_orders::create($request_data);
                        if ($order) {
                            $message = "Package reserved ";
                            return $this->apiResponse6($cardscount - 1, $order->id, $message, 200);
                        } else {
                            return $this->apiResponse6(null, null, 'error to Reserve Order', 404);
                        }
        } else {
            $message = "No Package Avaliable";
            return $this->apiResponse6($cardscount, null, $message, 404);
        }
    }

    public function clientpackorder(Request $request)
    {


        $order = Packages_orders::where(array('client_id' => $request->clientid,'paid'=>'true','active'=>0))->with('Packages')->first();
        
      
        if (!empty($order) ) {
            return $this->apiResponse($order, 'You have orders', 200);
        } else {
            return $this->apiResponse($order, 'No orders Avaliable', 200);
        }
    }




    public function finalpackorder(Request $request)
    {
 
 
 
        $id = $request->order_id;
        $order = Packages_orders::find($id);



        $dubiapi =  package::where('id', $order->package_id)->first();
        if (!empty($order)) {
            $is_expired = $order->created_at->addMinutes(5);
            if ($is_expired < \Carbon\Carbon::now()) {

                return response()->json(['status' => 'error']);
            } else {
                
                  $packcount = Packages_orders::where(array('client_id' => $order->client_id,'active'=>0,'paid'=>'true'))->first();
                    if(!empty($packcount)){
                 $pacid=$packcount->id;        
                DB::update("update packages_orders set active=1 where id = $pacid ");
                    }
                    
                $order->transaction_id = $request->transaction_id;
                $order->paid = 'true';
                $order->paymenttype = "معاملات";
                $daysToAdd = $dubiapi->package_number;
                $order->endDate=Carbon::now()->addDays($daysToAdd);
                $clientdata =  Client::where('id', $order->client_id)->first();
                if ($order->update()) {  
                    
                  
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
