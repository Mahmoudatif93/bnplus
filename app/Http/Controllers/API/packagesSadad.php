<?php

namespace App\Http\Controllers\API;

use App\Paymentcommissionsmodel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Packages_orders;
use App\Cards;
use App\Anaiscodes;
use App\cards_anais;
use App\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\package;
use DB;
class packagesSadad extends Controller
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

    public function verifypackage(Request $request)
    {  $card = package::where(array('id' => $request->package_id,'active'=>0))->orderBy('id', 'desc')->first();
        $amountprice = $request->package_amount;   
      //  dd($request);
        
                    $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjk3NTMxYzJkNDkzMjdhMzAwNmRjN2NiOTc4NTRlODFjMWMwYzVkYWMzN2UyNzhhZjViMjYyNmFmMTE5YjVjMDMxZTQzNGU0NDE3ODFlYjkiLCJpYXQiOjE2NDQzNTU0NjEsIm5iZiI6MTY0NDM1NTQ2MSwiZXhwIjoxNzcwNTg1ODYxLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.s0Yat6614IuR3jMJ0njo4-50DzfSjCd5tASebIDUyUP_O_wxFp4ed3av1Dari_xDv4OBn23wjoIURUOSkuVGSz84sLTbkWrv418CzZ-ygxXHeQoyZ-JUXGbk8-1A35SEJbBQdjPI8svlVs2UL_RTlQarZbDLDMtXH5heCsf3sf0nuK79zY_bhFFAZD882P3uViYnD-YcecRGFxjmxVz3vrShspwskg-kwM1sIrmLD95lRg7n7ZJItGCyaXDC27XJuVZUhmtCLA48iFBSBoTdk1NE_5pGiWn0UOzwvdbxWfKioQoeBrdP-wVJF9MDklahycPI4wN1ooKiSeeFL3xtBHSwjpk8GP1_y3UZZl99ANlR7j_jgKj8g_VH-w3m6I8dSTkbSvclBXY8joowgguOWkn4R3QV1hQtH4w-nf_14wV90hJE1O1NNEyQ3smidSSdQp0Qd_vlTqYOTgJPzlvkERxW-T2efJ9uM_TJFRPnXbSiLugC0AIIJw9GkBDAtUEhFKazYpRX4r45bOaOUKQtO65FFf_h40MBp-0DiTL6VIZX0X-jSxeAZ75ilBQVl7TUF_-zx5YsIN2xRLqgC97aqIe80rViUFARqWAQNQFCQFfe8Z7igpb0t4L49ZJ4JykktG03k53HZN4W2GZPOT2RdI2fgQVcytXza1VfXYmU2xo',
                        'X-API-KEY' => '984adf4c-44e1-418f-829b'
                    ])->post('https://api.plutus.ly/api/v1/transaction/sadadapi/verify', [
                        'mobile_number' => $request->mobile_number,
                        'birth_year' => $request->birth_year,
                        'amount' => $amountprice
                    ]);
                    
                   
                    if (!empty($card)) {
                        if (isset($response['error'])) {
                            return $this->apiResponse4(false, $response['error']['message'], $response['error']['status']);
                        } else {
                            $process_id = $response['result']["process_id"];
                            $request_data['package_id'] = $card->id;
                            $sadadamout = $response['result']["amount"];
                            $request_data['sadadamout'] = $sadadamout;
                            $request_data['client_id'] = $request->client_id;
                            $request_data['package_price'] = $request->package_amount;
                            $request_data['client_name'] = $request->client_name;
                            $request_data['client_number'] = $request->client_number;
                            $request_data['process_id'] = $process_id;
                            $request_data['invoice_no'] = rand();
                            $request_data['paymenttype'] = "سداد";
                            $order = Packages_orders::create($request_data);
                            return $this->apiResponse5(true, $response['message'], $response['status'], $response['result'], $order->id);
                        }
                    } else {
                        return $this->apiResponse4(false, 'No Avaliable package', 400);
                    }
    }
    public function confirmpackage(Request $request)
    {
        $idfirst = $request->order_id;
        $orderfirst = Packages_orders::find($idfirst);
        if (!empty($orderfirst)) {
            $cards =   package::where(array('id'=> $orderfirst->package_id,'active'=>0))->first();
            $allcompanyid = array();
            
           //     $amountprice = $request->package_amount;
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
                     $order = Packages_orders::find($id);
                      $packcount = Packages_orders::where(array('client_id' => $order->client_id,'active'=>0,'paid'=>'true'))->first();
                        if(!empty($packcount)){
                           $pacid=$packcount->id;
                $finalorders= DB::update("update packages_orders set active=1 where id = $pacid");
                        }
                        
                        
                
                 $daysToAdd = $cards->package_number;
                $order->endDate=Carbon::now()->addDays($daysToAdd);
                $order->transaction_id = $response['result']['transaction_id'];
                        $order->paid = 'true';
                  $order->paymenttype = "سداد";
                
                    if ($order->update()) {
                        
                 
                
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
}
