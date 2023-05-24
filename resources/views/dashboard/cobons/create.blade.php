@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>@lang('site.cobons')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{ route('dashboard.cobons.index') }}"> @lang('site.cobons')</a></li>
            <li class="active">@lang('site.add')</li>
        </ol>
    </section>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<script>
    


    $(document).ready(function() {
        $('#company_idlocal').multiselect({
          includeSelectAllOption: true,
        });
           $('#company_idnational').multiselect({
          includeSelectAllOption: true,
        });
           $('#company_idall').multiselect({
          includeSelectAllOption: true,
        });
    });
    
</script>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">@lang('site.add')</h3>
            </div><!-- end of box header -->
            <div class="box-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.cobons.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}



            
                  


       <div class="form-group col-6"> <label>@lang('site.packages')</label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">@lang('site.packages')</option>
                          @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                         <div class="form-group col-6">
                                <label>@lang('site.cobon_code')</label>
                                <input type="text" name="cobon_code" class="form-control ">
                            </div
                            
                    
  <div class="form-group col-6">
                                <label>@lang('site.start_date')</label>
                                <input type="date" name="start_date" class="form-control ">
                            </div>
                              <div class="form-group col-6">
                                <label>@lang('site.end_date')</label>
                                <input type="date" name="end_date" class="form-control ">
                            </div>
                            
                               <div class="form-group col-6">
                                <label>@lang('site.discount_percentage')</label>
                                <input type="text" name="discount_percentage" class="form-control ">
                            </div>
                            
                                 <div class="form-group col-6">
                                <label>@lang('site.number_use')</label>
                                <input type="number" name="number_use" class="form-control ">
                            </div>
                    
                    <div class="form-group col-6"> <label>@lang('site.cobon_type')</label>
                        <select name="cobon_type" id="kind" class="form-control">
                            <option value="">@lang('site.cobon_type')</option>
                            <option value="local">@lang('site.local')</option>
                            <option value="national">@lang('site.national')</option>
                            
                            <option value="all">@lang('site.all')</option>

                        </select>
                    </div>
                    <!--
<div class="form-group col-6" id="companies" > <label>@lang('site.Companies')</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="">@lang('site.Companies')</option>

                </select>
            </div>-->

         

            <div class="form-group col-6"  id="local"  style="display:none"> <label>@lang('site.Companies')</label>
                <select name="company_id[]" id="company_idlocal" class="form-control selectpicker"   multiple="multiple" data-live-search="true">
                    
                    @foreach($Complocal as $coml)
                     <option value="{{$coml->id}}">{{$coml->name}}</option>
                    @endforeach

                </select>
            </div>
            
                  <div class="form-group col-6" id="nationale"  style="display:none"> <label>@lang('site.Companies')</label>
                <select name="company_id[]" id="company_idnational" class="form-control "   multiple="multiple"  data-live-search="true">
                       @foreach($Compnational as $comn)
                     <option value="{{$comn->id}}">{{$comn->name}}</option>
                    @endforeach

                </select>
            </div>
            
                  <div class="form-group col-6"   id="all" style="display:none" > <label>@lang('site.Companies')</label>
                <select name="company_id[]" id="company_idall" class="form-control selectpicker"  multiple data-live-search="true">
                   
                          @foreach($Companies as $com)
                     <option value="{{$com->id}}">{{$com->name}}</option>
                    @endforeach

                </select>
            </div>
            
            <!--
            <div class="form-group col-6" id="cards"> <label>@lang('site.cards')</label>
                <select name="card_id" id="card_id" class="form-control">
                    <option value="">@lang('site.cards')</option>

                </select>
            </div>-->
            
            
           



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





</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="cobon_type"]').on('change', function() {
            var kind = $(this).val();
           
     //   alert(kind);
        if(kind=='local'){
            $("#local").show();
             $("#nationale").hide();
              $("#all").hide();

        }
        else if(kind=='national'){
             $("#local").hide();
             $("#nationale").show();
              $("#all").hide();
        }else{
          $("#local").hide();
             $("#nationale").hide();
              $("#all").show();
            
        }
           /* if (kind) {
                $.ajax({
                    url: 'compcards/' + kind,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[id="company_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[id="company_id"]').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');

                        });
                    }
                });
            } else {
                $('select[name="company_id"]').empty();
            }
            
            */
        });
    });
    
        $(document).ready(function() {
        $('select[name="company_id"]').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: 'compniescards/' + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="card_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="card_id"]').append('<option value="' + value['id'] + '">' + value['card_name'] + '</option>');

                        });
                    }
                });
            } else {
                $('select[name="card_id"]').empty();
            }
        });
    });
</script>


@endsection