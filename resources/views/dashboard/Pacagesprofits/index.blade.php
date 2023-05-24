@extends('layouts.dashboard.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.Pacagesprofits')
                <small> @lang('site.Pacagesprofits')</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.Pacagesprofits')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-12">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.Pacagesprofits')</h3>
                            
                            
                            <form action="{{ route('dashboard.Pacagesprofits.index') }}" method="get">

                        <div class="row">


       <div class="col-md-4">
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">@lang('site.packages')</option>
                          @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
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



    

@if(!empty($allprofits))

                                     <table  class="table" id="emptableid">
                                     <thead>
            <tr class="bg-success">
                  <th ></th>
                      <th ></th>
                       <th ></th>
                       <th ></th>
                        <th ></th>
                   <th style="font-size:25px">@lang('site.profits') @lang('site.in') {{$date1}}  @lang('site.to') {{$date2}}</th>
                                       
                
            </tr>
            
                <tr class="bg-primary">
                  <th ></th>
                      <th ></th>
                       <th ></th>
                       <th ></th>
                        <th ></th>  
                        
                                        <th style="font-size:40px;color:red" >{{$allprofits}}</th>
                    
                
            </tr>
        </thead>

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
