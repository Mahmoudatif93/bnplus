@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.Newproducts')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.Newproducts.index') }}"> @lang('site.Newproducts')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.Newproducts.update', $Newproducts->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}



         <div class="form-group">
                            <label>@lang('site.Catproducts')</label>
                            <select name="catproducts_id" class="form-control">
                                <option value="">@lang('site.Catproducts')</option>
                                @foreach ($Catproducts as $row)
                                    <option value="{{ $row->id }}" {{ $Newproducts->catproducts_id == $row->id ? 'selected' : '' }}>{{ $row->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                                <label>@lang('site.product_name')</label>
                                <input type="text" name="product_name" class="form-control "  value="{{ $Newproducts->product_name }}">
                            </div>
                            
                                <div class="form-group">
                                <label>@lang('site.product_link')</label>
                                <input type="text" name="product_link" class="form-control "  value="{{ $Newproducts->product_link }}">
                            </div>
                            

        <div class="form-group">
                            <label for="images">@lang('site.product_image')</label>
                            <div class="input-group">
                                    <input type="file" name="product_image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <img src="{{ $Newproducts->product_image }}" style="width: 100px" class="img-thumbnail image-preview" alt="">

                        </div>



         <div class="form-group">
                            <label>@lang('site.currancy')</label>
                            <select name="Currancy" class="form-control" onchange="changeautomanual()">
                            @if($Newproducts->Currancy == 1)
                                             <option value="1" selected >@lang('site.EG')</option>

                            @else
                        <option value="2" selected >@lang('site.DO')</option>

                            @endif
              

                           
                            </select>
                        </div>
                        
                        @if($Newproducts->Currancy == 1)
                           <div class="form-group col-6" id="product_buy_E1">
                                <label>@lang('site.product_buy_E')</label>
                                <input type="text" name="product_buy_E" class="form-control " value="{{ $Newproducts->product_buy_E }}">
                            </div>
                            
                            
                        @else
                            <div class="form-group col-6">
                                <label>@lang('site.product_buy_d')</label>
                                <input type="text" name="product_buy_d" class="form-control " value="{{ $Newproducts->product_buy_d }}">
                            </div>
                        @endif
                        

   @if($Newproducts->Currancy == 1)

                            <div class="form-group">
                                <label>@lang('site.product_sell')</label>
                                <input type="text" name="product_sell" class="form-control" value="{{ $Newproducts->product_sell }}">
                            </div>
                            
                             @else
                                <div class="form-group">
                                <label>@lang('site.product_sell')</label>
                                <input type="text" name="product_sell" class="form-control" value="{{ $Newproducts->product_sell_do }}">
                            </div>
                            
                              @endif
                            
                                     <div class="form-group">
                            <label>@lang('site.Program_view')</label>
                            <select name="Program_view" class="form-control">
                                 <option value="0" {{ $Newproducts->Program_view == 0 ? 'selected' : '' }}>@lang('site.all')</option>
                 <option value="1" {{ $Newproducts->Program_view == 1 ? 'selected' : '' }}>@lang('site.usersapp')</option>
                 <option value="2" {{ $Newproducts->Program_view == 2 ? 'selected' : '' }}>@lang('site.compapp')</option>

                           
                            </select>
                            
                            
        </div>
                    
   
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
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


@endsection
