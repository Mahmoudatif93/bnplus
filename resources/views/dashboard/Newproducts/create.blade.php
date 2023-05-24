@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>@lang('site.Newproducts')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{ route('dashboard.Newproducts.index') }}"> @lang('site.Newproducts')</a></li>
            <li class="active">@lang('site.add')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">@lang('site.add')</h3>
            </div><!-- end of box header -->
            <div class="box-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.Newproducts.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}



           <div class="form-group col-6"> <label>@lang('site.Catproducts')</label>
                        <select name="catproducts_id" id="catproducts_id" class="form-control">
                            <option value="">@lang('site.Catproducts')</option>
                            @foreach ($Catproducts as $row)
                            <option value="{{ $row->id }}" {{ old('catproducts_id') == $row->id ? 'selected' : '' }}>{{ $row->category }}</option>
                    @endforeach
                    </select>
            </div>
            
                            <div class="form-group col-6">
                                <label>@lang('site.product_name')</label>
                                <input type="text" name="product_name" class="form-control ">
                            </div>
                               <div class="form-group col-6">
                                <label>@lang('site.product_link')</label>
                                <input type="text" name="product_link" class="form-control ">
                            </div>
                            
                <label>@lang('site.product_image')</label>
                <input type="file" name="product_image" class="form-control" value="{{ old( 'product_image') }}">
            </div>

                    <div class="form-group col-6"> <label>@lang('site.currancy')</label>
                        <select name="Currancy" id="Currancy" class="form-control" onchange="changeautomanual()">
                            <option value="" disabled readonly selected>@lang('site.currancy')</option>
                            <option value="1">@lang('site.EG')</option>
                            <option value="2">@lang('site.DO')</option>

                        </select>
                    </div>


     


            <div id="product_buy_E" style="display: none;">
                  <div class="form-group col-6">
                                <label>@lang('site.product_buy_E')</label>
                                <input type="number" name="product_buy_E" class="form-control " step="0.01">
                            </div>
            </div>
              <div id="product_buy_d" style="display: none;">
                  <div class="form-group col-6">
                                <label>@lang('site.product_buy_d')</label>
                                <input type="number" name="product_buy_d" class="form-control " step="0.001">
                            </div>
            </div>
            
                
                  <div class="form-group col-6">
                                <label>@lang('site.product_sell')</label>
                                <input type="number" name="product_sell" class="form-control " step="0.001">
                            </div>
            
            
            
                   <div class="form-group col-6"> <label>@lang('site.Program_view')</label>
                        <select name="Program_view" id="Program_view" class="form-control" >
                            <option value="0">@lang('site.all')</option>
                            <option value="1">@lang('site.usersapp')</option>
                            <option value="2">@lang('site.compapp')</option>

                        </select>
                    </div>

           


        </div>
        <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
        </div>

        </form><!-- end of form -->

</div><!-- end of box body -->

</div><!-- end of box -->

</section><!-- end of content -->

</div><!-- end of content wrapper -->


<script>

    



    function changeautomanual() {

        if (document.getElementById("Currancy").value == 2) {
            document.getElementById("product_buy_E").style.display = "none";
            document.getElementById("product_buy_d").style.display = "block";

        } else {
            document.getElementById("product_buy_d").style.display = "none";
            document.getElementById("product_buy_E").style.display = "block";

        }

    }


</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kind"]').on('change', function() {
            var kind = $(this).val();
            if (kind) {
                $.ajax({
                    url: 'compcard/' + kind,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {


                        $('select[name="company_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="company_id"]').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');


                        });
                        if (kind == "national") {
                            document.getElementById("nationalcheck").style.display = "block";
                            
                            

                        } else {
                            document.getElementById("nationalcheck").style.display = "none";
                          


                        }

                    }
                });
            } else {
                $('select[name="company_id"]').empty();
            }
        });
    });
</script>


@endsection