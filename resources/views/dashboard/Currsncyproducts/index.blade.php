@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.Currsncyproducts')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.Currsncyproducts')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.Currsncyproducts') <small>{{ $Currsncyproducts->total() }}</small></h3>

                    <form action="{{ route('dashboard.Currsncyproducts.index') }}" method="get">

                        <div class="row">

                          <!--  <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_Cards'))
                                    <a href="{{ route('dashboard.Currsncyproducts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div> -->

                        </div>
                    </form><!-- end of form -->

               
                   
                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($Currsncyproducts->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                
                               
                                <th>@lang('site.currancy')</th>
              
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($Currsncyproducts as $index=>$category)
                                <tr>
                               
                        
                                    <td>{{ $category->currancy }}</td>
                             

                                                                   <td>
                                        @if (auth()->user()->hasPermission('update_Cards'))
                                        @if($category->purchase==0)
                                            <a href="{{ route('dashboard.Currsncyproducts.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                    
                                            @endif
                                            @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                  <!--
                                      @if (auth()->user()->hasPermission('delete_Cards'))
                                            <form action="{{ route('dashboard.Currsncyproducts.destroy', $category->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <input  type="hidden" name="card_id"value="{{$category->id}}">
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
-->
                                        
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $Currsncyproducts->appends(request()->query())->links() }}

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
