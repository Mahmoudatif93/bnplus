@extends('layouts.dashboard.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.cardsreports')
                <small> @lang('site.cardsreports')</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.cardsreports')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.cardsreports')</h3>
                            
                            
                            <form action="{{ route('dashboard.cardsreports.index') }}" method="get">

                        <div class="row">
<!--

       <div class="col-md-4">
                        <select name="searc_id" id="searc_id" class="form-control">
                             <option readonly disabled selected>@lang('site.choose')</option>
                            <option value="all">@lang('site.all')</option>
                      <option value="true">تم الدفع</option>
                   
                      
                       <option value="false">لم يتم الدفع
                       </option>
                      
                        </select>
                    </div>-->
                    
                            <div class="col-md-4">
                                <input type="date" name="date1" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
                             <div class="col-md-4">
                                <input type="date" name="date2" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
</br>
 <div class="col-md-4 mt-5"></div>
                            <div class="col-md-4 mt-5 ">
                                <button type="submit" class="btn btn-primary"    style="
    margin-top: 33px;
    margin-inline: 79px;
"><i class="fa fa-search"  ></i> @lang('site.search')</button>
                               
                               
                            </div>

                        </div>
                    </form><!-- end of form -->
    

                        </div><!-- end of box header -->

                 

                            <div class="box-body table-responsive primary">
    @if (!empty($orders))

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                               
                                <th>@lang('site.orderNumber')</th>
                                <th>@lang('site.client_name')</th>
                                <th>@lang('site.kind')</th>
                                 <th>@lang('site.name')</th>
                                  <th>@lang('site.kind')</th>
                                  <th>@lang('site.Companies')</th>
                                <th>@lang('site.card_code')</th>
                                <th>@lang('site.paymenttype')</th>
                                
                                <th>@lang('site.created_at')</th>
                               
                                <th>@lang('site.product_sell')</th>
                                  <th>@lang('site.purchaseprice')</th>
                                <th>@lang('site.profits')</th>
                                
                                 <th>@lang('site.paid')</th>
                              
                            
                            
                               
                            </tr>
                            </thead>

                            <tbody>
                               <?php $tot=0;
                               $oldprice=0;
                               ?>
                            @foreach ($orders as $index=>$category)
                            
                                @if($category->purchaseprice !=Null && $category->old_price==Null ) 
                                     <?php $tot +=number_format($category->card_price- $category->purchaseprice,2);?>
                                          @endif
                            
                                         @if($category->old_price !=Null && $category->purchaseprice==Null ) 
                                             <?php $tot +=number_format($category->card_price- $category->old_price,2);?>
                                               @endif
                                        
                                           
                          
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->client_name }}</td>
                                     <td>{{ $category->client_number }}</td>
                                     <td>{{ $category->card_name }}</td>
                                     <td>
                                           @if($category->nationalcompany=='local')
                                    @lang('site.local')
                                    @elseif($category->nationalcompany=='national')
                                    @lang('site.national')
                                    @endif
                                         
                                     </td>
                                     
                                     <td>
                                           @if($category->api==1 && $category->api2==0)
                               {{     'كروت شركه دبي' }}
                                    @elseif($category->api2==1 && $category->api==0)
                                  {{ 'كروت شركه انيس'}}
                                     @elseif($category->api2==0 && $category->api==0)
                                 {{  'كروت  لوحه التحكم'}}
                                    @endif
                                         
                                     </td>
                                     
                                     
                                     <td>{{ $category->card_code }}</td>
                                        <td>{{ $category->paymenttype }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                          <td>{{ $category->card_price }}</td>
                                           <td>
                                           
                                           
                                             @if($category->purchaseprice !=Null && $category->old_price==Null ) 
                                {{ number_format($category->purchaseprice,2) }}
                                          @endif
                            
                                         @if($category->old_price !=Null && $category->purchaseprice==Null ) 
                                             {{ number_format($category->old_price,2) }}
                                               @endif
                                               
                                           </td>
                                           
                                    <td>      
                                     @if($category->purchaseprice !=Null && $category->old_price==Null ) 
                                     {{number_format($category->card_price- $category->purchaseprice,2) }}
                                          @endif
                            
                                         @if($category->old_price !=Null && $category->purchaseprice==Null ) 
                                          {{ number_format($category->card_price- $category->old_price,2) }}
                                               @endif
                                               
                                               
                                               
                                               </td>

                                    
                                    <td>{{ $category->paid }}</td>
                      

                              
                                </tr>

                            @endforeach
                            </tbody>
                            
                                                        
                      <tfoot>
    <tr style="  border: 1px solid black;
  border-collapse: collapse;color='red' ;  background-color: #D6EEEE;">

                                     <th colspan="11"  >@lang('site.cardsreports')</th>
    <th> <button  class="btn btn-primary ">  {{number_format( $tot,2) }}   </button></th>
    </tr>
  </tfoot>
  

                        </table><!-- end of table -->

@endif











                     

                            </div>


                    </div><!-- end of box -->

                </div><!-- end of col -->

  
            </div><!-- end of row -->

        </section><!-- end of content section -->

    </div><!-- end of content wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>






@endsection
