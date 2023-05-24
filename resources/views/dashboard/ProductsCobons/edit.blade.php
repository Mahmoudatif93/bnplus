@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.ProductsCobons')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.ProductsCobons.index') }}"> @lang('site.ProductsCobons')</a></li>
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

                    <form action="{{ route('dashboard.ProductsCobons.update', $ProductsCobons->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}


                        <div class="form-group">
                                <label>@lang('site.cobon')</label>
                                <input type="text" name="cobon" class="form-control "  value="{{ $ProductsCobons->cobon }}">
                            </div>
                                 <div class="form-group">
                                <label>@lang('site.amounts')</label>
                                <input type="text" name="amount" class="form-control "  value="{{ $ProductsCobons->amount }}">
                            </div>
                            <div class="form-group">
                                <label>@lang('site.from_date')</label>
                                <input type="date" name="from_date" class="form-control "  value="{{ $ProductsCobons->from_date }}">
                            </div>
                               <div class="form-group">
                                <label>@lang('site.to_date')</label>
                                <input type="date" name="to_date" class="form-control "  value="{{ $ProductsCobons->to_date }}">
                            </div>

                      
         
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
