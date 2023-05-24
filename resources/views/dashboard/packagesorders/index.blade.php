@extends('layouts.dashboard.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.Packages_orders')
                <small> @lang('site.Packages_orders')</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.Packages_orders')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.Packages_orders')</h3>


                        </div><!-- end of box header -->

                 

                            <div class="box-body table-responsive primary">

                                     <table  class="table table-striped bg-success" id="emptableid">
                                     <thead>
            <tr class="bg-primary">
                                          <th >@lang('site.client_name')</th>
                                        <th>@lang('site.phone')</th>
                                        <th>@lang('site.price')</th>
                                         <th>@lang('site.package_name')</th>
                                         <th>@lang('site.packages_amount')</th>
                                        <th>@lang('site.number_use')</th>
                                       <th>@lang('site.paid')</th>
                                       <th>@lang('site.paymenttype')</th>
                                       <th>@lang('site.end_date')</th>
                                       
                                        <th>@lang('site.created_at')</th>
                
                
            </tr>
        </thead>

                                </table><!-- end of table -->

                              

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





<script type="text/javascript">
    
    $(document).ready(function() {
 
      $("#emptableid").DataTable({
              serverSide: true,
              ajax: {
                  url: '{{url('dashboard/pack_list')}}',
                  data: function (data) {
                      data.params = {
                          sac: "helo"
                      }
                  }
              },
              buttons: false,
              searching: true,
              scrollY: 500,
              scrollX: true,
              scrollCollapse: true,
              columns: [
                  {data: "client_name", name: 'packages_orders.client_name'},
                  {data: "client_number", name: 'packages_orders.client_number'},
                  {data: "package_price", name: 'packages_orders.package_price'},
                  {data: "package_name", name: 'packages.package_name'},
                   {data: "packages_amount", name: 'packages.packages_amount'},
                  {data: "package_number", name: 'packages.package_number'},
                  {data: "paid", name: 'packages_orders.paid'},
                  {data: "paymenttype", name: 'packages_orders.paymenttype'},
                  {data: "endDate", name: 'packages_orders.endDate'},
                  {data: "created_at", name: 'packages_orders.created_at'}
               
              ]  
        });
 
    });
 
  </script>
@endsection
