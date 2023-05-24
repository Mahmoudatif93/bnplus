<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('index');

            //Companies routes
            Route::resource('Companies', 'CompanyController')->except(['show']);

   //products routes
            Route::resource('products', 'ProductsController')->except(['show']);
                 Route::resource('productsorders', 'ProductsOrdersController')->except(['show']);
            Route::get('/productsorderdetails/{id}', 'ProductsOrdersController@productsorderdetails')->name('productsorderdetails');

 Route::resource('productprofits', 'productprofits')->except(['show']);

            //Cards routes
            Route::resource('Cards', 'CardsController')->except(['show']);
            
            Route::get('offer/{id}', 'CardsController@offer')->name('offer');
            Route::get('notoffer/{id}', 'CardsController@notoffer')->name('notoffer');
            Route::post('importcard', 'CardsController@import')->name('importcard');
            Route::any('Cards/compcard/{id}','CardsController@cmpanies')->name('Cards/compcard');

  //packages routes
            Route::resource('packages', 'PackageController')->except(['show']);
         //   Packages_orders routes
Route::resource('packagessorders', 'packagessorders')->except(['show']);
            Route::get('/pack_list','packagessorders@pac_processing');
  //cobons routes
            Route::resource('cobons', 'CobonController')->except(['show']);
        Route::any('cobons/compcards/{id}','CardsController@cmpanies')->name('cobons/compcards');
        Route::any('cobons/compniescards/{id}','CobonController@compniescards')->name('cobons/compniescards');
        
        Route::get('/cobons/{id}', 'CobonController@show')->name('cobons.products');
        
            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            //order routes
            Route::resource('orders', 'OrderController');
 Route::resource('cardsreports', 'cardsnewreport');



Route::get('orderss', 'OrderController@index2')->name('orderss.index2');
Route::get('/emp_list','OrderController@ss_processing');

            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
            Route::get('/dubiorders/{order}', 'DubaiOrdersController@dubiorders')->name('dubiorders.products');
            Route::get('enableapi', 'DubaiOrdersController@enableapi')->name('enableapi');
            Route::get('enablenotapi', 'DubaiOrdersController@enablenotapi')->name('enablenotapi');
            Route::get('enablenotlocalapi', 'DubaiOrdersController@enablenotlocalapi')->name('enablenotlocalapi');


           
             //dubiorders routes
             Route::resource('dubiorders', 'DubaiOrdersController');
             Route::resource('dubioff', 'DubaiOffController');
             Route::get('/dubioff/{id}', 'DubaiOffController@show')->name('dubioff.products');
             Route::get('/disabledubioff/{id}', 'DubaiOffController@disabledubioff')->name('dubidisable');
             Route::get('/enabledubioff/{id}', 'DubaiOffController@enabledubioff')->name('dubienable');

             Route::get('/dubidisablecard/{id}', 'DubaiOffController@dubidisablecard')->name('dubidisablecard');
             Route::get('/dubienablecard/{id}', 'DubaiOffController@dubienablecard')->name('dubienablecard');

///////////////////////////////////////////localcompany controle
             Route::resource('localcompany', 'localcompanyController');
             Route::get('/localoff/{id}', 'localcompanyController@show')->name('localoff.products');
             
             Route::get('/localdisable/{id}', 'localcompanyController@disabledubioff')->name('localdisable');
             Route::get('/localenable/{id}', 'localcompanyController@enabledubioff')->name('localenable');
             Route::get('/localdisablecard/{id}', 'localcompanyController@dubidisablecard')->name('localdisablecard');
             Route::get('/localenablecard/{id}', 'localcompanyController@dubienablecard')->name('localenablecard');

      Route::get('/purchesmanual/{id}', 'localcompanyController@purchesmanual')->name('purchesmanual');
      
          Route::get('/purchesmanualna/{id}', 'nationalcompanyController@purchesmanualna')->name('purchesmanualna');


///////////////////////////////////////////nationalcompany controle
Route::resource('nationalcompany', 'nationalcompanyController');
Route::get('/nationaloff/{id}', 'nationalcompanyController@show')->name('nationaloff.products');
Route::get('/nationaldisable/{id}', 'nationalcompanyController@disabledubioff')->name('nationaldisable');
Route::get('/nationalenable/{id}', 'nationalcompanyController@enabledubioff')->name('nationalenable');
Route::get('/nationaldisablecard/{id}', 'nationalcompanyController@dubidisablecard')->name('nationaldisablecard');
Route::get('/nationalenablecard/{id}', 'nationalcompanyController@dubienablecard')->name('nationalenablecard');



/////////////////////////////swagger//////////////////////////////////////
Route::resource('swaggeroff', 'swaggerOffController');
Route::get('/swaggeroff/{id}', 'swaggerOffController@show')->name('swaggeroff.products');
Route::get('/disableswaggeroff/{id}', 'swaggerOffController@disabledubioff')->name('swaggerdisable');
Route::get('/enabledswaggeroff/{id}', 'swaggerOffController@enabledubioff')->name('swaggerenable');
Route::get('enableswaggerapi', 'DubaiOrdersController@enableswaggerapi')->name('enableswaggerapi');
//////////////////swaggerorders
Route::resource('swaggerorders', 'SwaggerOrdersController');

/////////////////////////

///////////////
Route::resource('ProfitRatio', 'ProfitRatio');
Route::resource('AnisCodes', 'AnisCodes');


           //  Route::get('/dubiorders/{order}/products', 'DubaiOrdersController@products')->name('dubiorders.products');
            //currancy routes
            Route::resource('currancy', 'currancyController');

             //currancy routes
             Route::resource('currancylocal', 'currancyLocalController');

              //currancy routes
            Route::resource('currancyswaggernational', 'currancyNationalController');
            
                     Route::resource('Paymentcommissions', 'Paymentcommissions');

                        Route::get('/Paymentcommissionscreate/{name}', 'Paymentcommissions@Paymentcommissionscreate')->name('Paymentcommissionscreate');

            //user routes
            Route::resource('users', 'UserController')->except(['show']);

            Route::get('checkpdf', 'CompanyController@generate_pdf')->name('checkpdf');


Route::post('manualprofit','WelcomeController@index')->name('manualprofit');

/////////////////////packages profits
Route::resource('Pacagesprofits', 'PacagesprofitsController');

/////////////////////Catproducts تصنيف المنتجات

Route::resource('Catproducts', 'C_productsController');
/////////////////////Catproducts عملات المنتجات
Route::resource('Currsncyproducts', 'CurrProductsController');
///////////////////////////////////////////////////////

/////////////////////New products  المنتجات
Route::resource('Newproducts', 'NewProductsController');

/////////////////////ProductsCobons  المنتجات
Route::resource('ProductsCobons', 'ProductsCobonController');
///////////////////////////////ProductsDelivery////////////////////////
Route::resource('ProductsDelivery', 'ProductsDeliveryController');


/////////////////////////////تقارير المنتجات//////////////////////////////////////
Route::resource('ProductsReport', 'ProductsReport');
 Route::get('approve/{id}', 'ProductsReport@approve')->name('approve');
  Route::get('disapprove/{id}', 'ProductsReport@disapprove')->name('disapprove');
    Route::get('details/{id}', 'ProductsReport@details')->name('details');
    

///////////////////////////////////////////////////////


        });//end of dashboard routes

    });


                //    Route::get('reservewebview/{id}', 'API\TadawalController@reservewebview')->name('reservewebview');
                    



