@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.cobons')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.cobons')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.cobons') <small>{{ $cobons->total() }}</small></h3>

                    <form action="{{ route('dashboard.cobons.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_orders'))
                                    <a href="{{ route('dashboard.cobons.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

               
                   
                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($cobons->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                               
                      
                       <th>@lang('site.cobon_code')</th>
                         <!-- {{-- <th>@lang('site.compname')</th>--}}-->
                                 <th>@lang('site.discount_percentage')</th>
                                  <th>@lang('site.packages_amount')</th>
                                 
                                <th>@lang('site.start_date')</th>
                                <th>@lang('site.end_date')</th>
                                
                               
                                <th>@lang('site.number_use')</th>
                                <th>@lang('site.active')</th>
                                 <th>@lang('site.compname')</th>
                            
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($cobons as $index=>$category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    
                                     <td>{{ $category->cobon_code }}</td>
                                 <!--    {{--  <td>{{ $category->companies->name }}</td>--}} -->
                                        <td>{{ $category->discount_percentage }}</td>
                                    <td>{{ $category->package->package_name}}</td> 
                            <td>{{ $category->start_date->format('Y-m-d')}}</td>
                               <td>{{ $category->end_date->format('Y-m-d')}}</td>
                                  
                               
                                    <td>{{ $category->number_use }}</td>
                                    
                                    
                                    <td>
                                        @if($category->active ==1)
                                        <button class="btn btn-danger" disabled>
                                        {{"Not Active"}}
                                    </button>
                                        @else
                                        <button class="btn btn-success" disable>
                                        {{"Activ"}}
                                    </button>
                                        @endif
                                        </td>

                             

 <td>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('dashboard.cobons.products',$category->id) }}">


                                        <i class="fa fa-list"></i>
                                        @lang('site.show')
                                    </a>


                                </td>
                                        


                                                                   <td>
                                        @if (auth()->user()->hasPermission('update_orders'))
                                            <a href="{{ route('dashboard.cobons.edit', $category->cobon_code)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                  
                                       @if (auth()->user()->hasPermission('delete_orders'))
                                            <form action="{{route('dashboard.cobons.destroy', $category->cobon_code) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <input  type="hidden" name="card_id"value="{{$category->id}}">
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif

                                    
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $cobons->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->



    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="company_id"]').on('change', function() {
            var company_id = $(this).val();
            if(company_id) {
                $.ajax({
                    url: 'compcard/'+company_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="card_price"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="card_price"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="card_price"]').empty();
            }
        });
    });
</script>



@endsection
