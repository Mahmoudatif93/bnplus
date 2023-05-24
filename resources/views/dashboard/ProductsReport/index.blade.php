@extends('layouts.dashboard.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.ProductsReport')
                <small> @lang('site.ProductsReport')</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.ProductsReport')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.ProductsReport')</h3>
                            
                            
                            <form action="{{ route('dashboard.ProductsReport.index') }}" method="get">

                        <div class="row">


       <div class="col-md-4">
                        <select name="searc_id" id="searc_id" class="form-control">
                             <option readonly disabled selected>@lang('site.choose')</option>
                            <option value="all">@lang('site.all')</option>
                      <option value="paid">تم الدفع</option>
                      <option value="pinding">تم ال
                      دفع وفي انتظار التوصيل 
                      </option>
                         <option value="deliverd">تم ال
                      دفع والتوصيل 
                      </option>
                      
                       <option value="not">لم يتم الدفع
                       </option>
                       
                        <option value="can">تم الالغاء
                       </option>
                        </select>
                    </div>
                    
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
    @if (!empty($allprofits))

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                               
                                <th>@lang('site.orderNumber')</th>
                                <th>@lang('site.client_name')</th>
                                <th>@lang('site.phone')</th>
                                 <th>@lang('site.region')</th>
                                  <th>@lang('site.city')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.addressphone')</th>
                                <th>@lang('site.paymenttype')</th>
                                
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.total_price')</th>
                                 <th>@lang('site.paid')</th>
                                  <th>@lang('site.delivery_date')</th>
                                <th>@lang('site.edit_order')</th>
                                <th>@lang('site.details')</th>
                            
                               
                            </tr>
                            </thead>

                            <tbody>
                               
                            @foreach ($allprofits as $index=>$category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->client_name }}</td>
                                     <td>{{ $category->client_number }}</td>
                                     <td>{{ $category->ClientAddress->region }}</td>
                                     <td>{{$category->ClientAddress->city }}</td>
                                     <td>{{ $category->ClientAddress->address_details }}</td>
                                     <td>{{ $category->ClientAddress->address_phone }}</td>
                                        <td>{{ $category->paymenttype }}</td>
                                        <td>{{ $category->created_at }}</td>
                                          <td>{{ $category->total_price }}</td>
                                    
                                    <td>{{ $category->paid }}</td>
                                     <td>{{ $category->delivery_date }}</td>
                              <td>
                                    @if($category->delevery ==0 && $category->paymenttype =='دفع عند الاستلام'  )
                                    <a  href="{{ route('dashboard.approve', $category->id) }}" class="btn btn-warning"> <i class="fa fa-edit"></i> {{"تاكيد التوصيل"}} </a>
                                     <a  href="{{ route('dashboard.disapprove', $category->id) }}" class="btn btn-danger"> <i class="fa fa-edit"></i> {{"الغاء "}} </
                                       @elseif($category->delevery ==1 && $category->paymenttype =='دفع عند الاستلام')
                                    <button  class="btn btn-success ">     {{"تم التسليم   "}} 
                                    </button>
                                    
                                    
                                     @elseif($category->delevery ==2  && $category->paymenttype =='دفع عند الاستلام')
                                    <button  class="btn btn-danger ">     {{"الغاء  "}} 
                                    </button>
                                      @else
                                    <button  class="btn btn-info ">     
                                    </button>
                                    @endif
                                    </td>
                                    
                     <td>  <a target="_blank" href="{{ route('dashboard.details', $category->id) }}" class="btn btn-primary"> <i class="fa fa-info-circle"></i> {{"Details "}} </a>
   </td>
                              
                                </tr>

                            @endforeach
                            </tbody>

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
