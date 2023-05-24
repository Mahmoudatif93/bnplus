<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/////////
Route::middleware('jwtAuth')->group(function() {
    Route::get('logout','AuthController@logout');
    Route::get('me','AuthController@me');
    Route::get('payload','AuthController@payload');
    Route::resource('posts','postController');

/////////////////////////////
Route::resource('companies','CompanyController');
Route::resource('cards','CardController');
Route::post('localcards','CardController@localcards');
Route::post('nationalcards','CardController@nationalcards');
//////////used apies
Route::post('allcompanies','CompanyController@allcompanies');
Route::post('cardsbycompany','CardController@cardsbycompany');
Route::post('cardscount','CardController@cardscount');

//Route::post('clientorder','OrderController@clientorder');
Route::get('commissionmoamlat','OrderController@commissionmoa');
Route::get('commissions','OrderController@commissions');

//////////////////////Sadad API

Route::post('verify','SadadController@verify');
Route::post('confirm','SadadController@confirm');


//////////////////////packages sadad////////////////////

Route::post('verifySadadpackage','packagesSadad@verifypackage');
Route::post('confirmsadadpackage','packagesSadad@confirmpackage');


//////////////////////////

////////////////////////tadalwal////////////////////
//Route::post('reservetadalwalorder','TadawalController@reservetadalwalorder');
Route::post('InitiateTlync','TadawalController@reservetadalwalorder');
Route::post('confirmorders','TadawalController@confirmorders');
//Route::post('InitiateTlync','TadawalController@InitiatePaymenttly');
Route::post('receipt/transaction','OrderController@transactionPayment');
//////////////////////packages tadalwal////////////////////
Route::post('reservePacktadalwal','packagesTadawal@reservePacktadalwal');
Route::post('confirmPacktadalwal','packagesTadawal@confirmPackorders');

////////////////المنتجات/////////////////////////////////////
Route::post('productpayment','productsOrder@productpayment');
Route::get('newproducts','NewProductsController@products');
Route::get('allcategoryproducts','NewProductsController@allcategoryproducts');
Route::post('Catproducts','NewProductsController@Catproducts');
Route::post('products_category','NewProductsController@products_category');
Route::post('productsCobons','NewProductsController@productsCobons');
////////////////////////
Route::post('addAddress','NewProductsController@addAddress');
Route::get('getalladdress','NewProductsController@getalladdress');
/////////////////////////////////السله/////////////////////////////////////
Route::post('productsbaskets','NewProductsController@productsbaskets');
Route::post('delete_one','NewProductsController@delete_one_products');
Route::post('delete_all','NewProductsController@delete_all_products');
Route::post('client_baskets','NewProductsController@client_baskets');


//////////////////////products sadad////////////////////

Route::post('verifySadadproducts','ProductsSadad@verifyproducts');
Route::post('confirmsadadproducts','ProductsSadad@confirmproducts');
//////////////////////products tadalwal////////////////////
Route::post('reserveProdtadalwal','ProductsTadawal@reserveProdtadalwal');
Route::post('confirmProdkorders','ProductsTadawal@confirmProdkorders');

////////////////////////////products معاملات//////////////////////
Route::post('reserveprodmoamlat','ProductsMoamalt@reserveprodorder');
Route::post('finalprodmoamlat','ProductsMoamalt@finalrodorder');
Route::post('clientprodorder','ProductsMoamalt@clientprodorder');
    //////////////////////////دفع عند الاستلام//////////////////////////
Route::post('paymentdelivery','ProductsSadad@verifyproductsdelivery');
Route::post('confirmproductsdelivery','ProductsSadad@confirmproductsdelivery');
/////////////////////////////
Route::post('clientorderprod','ProductsSadad@clientorderprod');
///////////////////////////////////////////
////////////////////////////معاملات//////////////////////
Route::post('reserveorder','OrderController@reserveorder');
Route::post('finalorder','OrderController@finalorder');
////////////////////////////packages معاملات//////////////////////
Route::post('reservepackmoamlat','packagesMoamlat@reservepackorder');
Route::post('finalpackmoamlat','packagesMoamlat@finalpackorder');
Route::post('clientpackorder','packagesMoamlat@clientpackorder');
///////////////////////////Expiredpackages///////////////
Route::post('Expiredpackages','PackageController@Expiredpackages');
Route::post('checkcobon','OrderController@checkcobon');





});


Route::post('check_balance','CompanyController@check_balance');

Route::post('clientorder','OrderController@clientorder');

/////////////////////web view 
            Route::get('reservewebview/{id}', 'TadawalController@reservewebview')->name('reservewebview');
            Route::get('/success', function () {
                return 'success';
});

          Route::get('/fail', function () {
                return 'Fail';
});

         Route::get('/fronturl', function () {
              //  return 'success';
                 return View::make("tdawalsuccess");
              
});

         Route::post('backendurl', 'TadawalController@backendfun')->name('backendfun');
         
         Route::post('backendurl2', 'productsOrder@backendurl2')->name('backendurl2');
         Route::post('backendfunprod', 'ProductsTadawal@backendfunprod')->name('backendfunprod');

            Route::post('backendurlpack', 'packagesTadawal@backendurlpack')->name('backendurlpack');
//Route::post('backendurl2', 'productsOrder@backendurl2')->name('backendurl2');
            /////////////////

///



Route::post('login','AuthController@login');
Route::post('sendemail','AuthController@sendresetcode');

//Route::middleware('jwt.auth')->post('login', 'API/AuthController@login');


Route::post('clientordertest','OrderController@clientorder');
///////////////////////packages///
Route::get('packages','PackageController@packages');

///////////////////////cobons///
Route::get('allcobons','CobonController@cobons');

////////////////////مبيعات الشركات
Route::post('companiessales','OrderController@companiessales');
Route::get('localcompanies','OrderController@localcompanies');

Route::get('companiessaless','OrderController@companiessales');

