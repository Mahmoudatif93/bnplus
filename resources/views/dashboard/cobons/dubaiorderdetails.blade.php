@extends('layouts.dashboard.app')

@section('content')




<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.compname')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li class="active">@lang('site.compname') {{--count( $compname)--}}</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header with-border">

                <h3 class="box-title" style="margin-bottom: 15px">@lang('site.compname') <small style="color: red;font-weight:bold"> {{--count( $compname)--}}</small>

                
                </h3>









            </div><!-- end of box header -->
            <div id="print-area">
                <div class="box-body" id="frame">

                    @if (count($cards)>0)

                    <table id="example" class="table table-hover">

                        <thead>
                            <tr>
                           
                                <th>@lang('site.Companies')</th>
                                

                 
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($cards as $index=>$category)
                            <tr>
                                
                                
                                    
                                <td >
                                      <button class="btn btn-success md-block" disabled>
                                    {{ $category->companies->name }} </button></td> 
                             

                               
                             





                            </tr>

                            @endforeach
                        </tbody>

                    </table><!-- end of table -->

                  

                    @else

                    <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->
            </div>

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->


@endsection