<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Currsncyproducts;
use App\Newproducts;
use App\Catproducts;
use App\Productsbasket;
use App\ProductsDelivery;
use App\ClientAddress;
use DB;
class NewProductsController extends Controller
{
    use ApiResourceTrait;
     public function products()
    {
        $products = Newproducts::with('Catproducts')->get();
       
    //ini_set('serialize_precision', 14);
       
  
        return $this->apiResponse($products, 200);
    }
    
       public function allcategoryproducts()
    {
        $Catproducts = Catproducts::all();
        return $this->apiResponse($Catproducts, 200);
    }
    
    public function Catproducts(Request $Request)
    {
        $Catproducts = Catproducts::where('id',$Request->category)->get();
        return $this->apiResponse($Catproducts, 200);
    }
    
       public function products_category(Request $Request)
    {
       $products = Newproducts::where('catproducts_id',$Request->category_id)->with('Catproducts')->get();
        return $this->apiResponse($products, 200);
    }
    
    
    
      public function productsCobons(Request $request)
    {
        $cobon=$request->cobon;
        
        
                $productpaskets=Productsbasket::where(array('client_id'=>$request->client_id))->get();
   
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
  // $dfees=$deliveryfees->delivery_fees;
   $dfees=0;
   $price=0;
   foreach($productpaskets as $row){
        $price +=$row->total_price;
   }
   
   $product_sell=number_format(($price - (($price *$cobon_amt)/100)) + $dfees,2) ;
       
$product_price=number_format($price,2) ;
    


       $cobons= DB::select("select * FROM  products_cobons  where to_date >=NOW() and cobon ='$cobon'");
       if(count($cobons) > 0){
           
   return $this->apiResponsecobons($productpaskets, $product_price,$product_sell,'Cobon is valid', 200);
       }else{
           return $this->apiResponse4(false, ' Cobons Not Avaliable', 200);
    }
    }
    
    
    ////////////////////////السله//////////////////////////////////////
    
          public function productsbaskets(Request $request)
    {
    
                $product=Newproducts::where('id',$request->newproducts_id)->first();
                $productpaskets=Productsbasket::where(array('newproducts_id'=>$request->newproducts_id,'client_id'=>$request->client_id))->get();
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
   //$product_sell=number_format(($product->product_sell - (($product->product_sell *$cobon_amt)/100)) + $deliveryfees->delivery_fees,2) ;
   $product_sell=number_format(($product->product_sell - (($product->product_sell *$cobon_amt)/100)) ,2) ;
 $product_buy=number_format(($product->product_buy_E - (($product->product_buy_E *$cobon_amt)/100)) ,2) ;
     // return count($productpaskets);
if(count($productpaskets) >0 ){
        $request_data['newproducts_id'] = $request->newproducts_id;
      $request_data['client_id'] = $request->client_id;
      $request_data['amount'] =$productpaskets[0]->amount + 1;
     $request_data['total_price'] = number_format( $request_data['amount'] * $product_sell,2) ;
      $request_data['total_price_before'] = number_format( $request_data['amount'] * $product_buy,2) ;
    Productsbasket::where(array('newproducts_id'=>$request->newproducts_id,'client_id'=>$request->client_id))->update($request_data);
    
    
    
}else{
    
      $request_data['newproducts_id'] = $request->newproducts_id;
      $request_data['client_id'] = $request->client_id;
      $request_data['amount'] = 1;
      $request_data['total_price'] = number_format($product_sell,2);
        $request_data['total_price_before'] = number_format( $request_data['amount'] * $product_buy,2) ;
    $order = Productsbasket::create($request_data);
                        
    
}
     $Client_basket=Productsbasket::where('client_id',$request->client_id)->with('Newproducts')->get();
$prodid=$request->newproducts_id;
$cid=$request->client_id;
            $totp= DB::select("select round(sum(total_price),2) pr FROM  productsbaskets  where   client_id ='$cid' and deleted_at is null");
$totpic=number_format($totp[0]->pr,2);

    $deliveryfees=  ProductsDelivery::first();
               $dfees=$deliveryfees->delivery_fees;
        
            

                        if ($Client_basket) {
                            $message = "Product added to Basket";
                            return $this->apiResponsetot($Client_basket, $totpic,$dfees,$message, 200);
                        } else {
                            return $this->apiResponsetot(null, 'error to add product in basket', 404);
                        }
    }
    
    public function delete_one_products(Request $request)
    {
                $product=Newproducts::where('id',$request->newproducts_id)->first();
                $productpaskets=Productsbasket::where(array('newproducts_id'=>$request->newproducts_id,'client_id'=>$request->client_id))->get();
       $product_sell=$product->product_sell ;
        $product_buy=$product->product_buy_E ;
if(count($productpaskets) >0 ){
    if($productpaskets[0]->amount ==0){
           Productsbasket::where('newproducts_id',$request->newproducts_id)->delete();
    }else{
    $request_data['newproducts_id'] = $request->newproducts_id;
      $request_data['client_id'] = $request->client_id;
      $request_data['amount'] =$productpaskets[0]->amount - 1;
     $request_data['total_price'] =  $productpaskets[0]->total_price - $product_sell ;
      $request_data['total_price_before'] =  $productpaskets[0]->total_price_before - $product_buy ;
    Productsbasket::where('newproducts_id', $request->newproducts_id)->update($request_data); 
    }

}else{
    Productsbasket::where('newproducts_id',$request->newproducts_id)->delete();
    
}
     $Client_basket=Productsbasket::where('client_id',$request->client_id)->get();
                        if ($Client_basket) {
                            $message = "Delete Product from Basket";
                            return $this->apiResponse($Client_basket, $message, 200);
                        } else {
                            return $this->apiResponse(null, 'error to add product in basket', 404);
                        }
                        
    }
    
    
    
    
      public function delete_all_products(Request $request)
    {
    
    
    if(!empty($request->newproducts_id)){
        Productsbasket::where(array('client_id'=>$request->client_id,'newproducts_id'=>$request->newproducts_id))->delete();
    }else{
        Productsbasket::where('client_id',$request->client_id)->delete();
    }


     $Client_basket=Productsbasket::where('client_id',$request->client_id)->get();
                        if ($Client_basket) {
                            $message = "Delete Product from Basket";
                            return $this->apiResponse($Client_basket, $message, 200);
                        } else {
                            return $this->apiResponse(null, 'error to add product in basket', 404);
                        }
    }
    
    
      public function client_baskets(Request $request)
    {
        if(!empty($request->newproducts_id)){
               $Client_basket=Productsbasket::where(array('client_id'=>$request->client_id,'newproducts_id'=>$request->newproducts_id))->with('Newproducts')->get();
        }else{
               $Client_basket=Productsbasket::where(array('client_id'=>$request->client_id))->with('Newproducts')->get();
        }
          
            $cid=$request->client_id;
            if(count($Client_basket) !=0){
                 $totp= DB::select("select round(sum(total_price),2) pr FROM  productsbaskets  where   client_id ='$cid' and  deleted_at is null");
                $totpic=number_format($totp[0]->pr,2);
       
                $deliveryfees=  ProductsDelivery::first();
               $dfees=$deliveryfees->delivery_fees;
            }else{
                $totpic=0;
                $dfees=0;
                
                 
            }
            
            
      
           
                        if ($Client_basket) {
                            $message = "Client Products in Basket";
                            return $this->apiResponsetot($Client_basket, $totpic,$dfees,$message, 200);
                        } else {
                            return $this->apiResponsetot(null, 'NO products in basket', 404);
                        }
                        
                        
    }
    
        public function addAddress(Request $request)
    {
                             $request_data['city'] = $request->city;
                            $request_data['region'] = $request->region;
                             $request_data['address_details'] = $request->address_details;
                              $request_data['address_phone'] = $request->address_phone;
                            $adress = ClientAddress::create($request_data);
                            $alladress=ClientAddress::all();
                            
                             return $this->apiResponse($adress,
                             'تم الاضافه',
                             200 );
    
    }
    
    
          public function getalladdress()
    {
                        
                            $alladress=ClientAddress::all();
                        ///    return $alladress;
                             return $this->apiResponse($alladress,'success', 200
                             );
    
    }
    
    
    
    
    
    
    
    
    
}
