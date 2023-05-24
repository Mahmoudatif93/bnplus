@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.packages')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.packages.index') }}"> @lang('site.packages')</a></li>
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

                    <form action="{{ route('dashboard.packages.update', $category->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

            
            
            
            

  <div class="form-group col-6">
                                <label>@lang('site.package_name')</label>
                                <input type="text" name="package_name" class="form-control " value="{{ $category->package_name }}">
                            </div>
                            
            
                  <div class="form-group">
                            <label for="images">@lang('site.packages_image')</label>
                            <div class="input-group">
                                    <input type="file" name="packages_image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <img src="{{ $category->packages_image }}" style="width: 100px" class="img-thumbnail image-preview" alt="">

                        </div>
                        
                        
            
                            <div class="form-group col-6">
                                <label>@lang('site.packages_amount')</label>
                                <input type="text" name="packages_amount" class="form-control "   value="{{ $category->packages_amount }}">
                            </div>
        
                      
             <div class="form-group col-6">
                                <label>@lang('site.package_number')</label>
                                <input type="number" name="package_number" class="form-control " value="{{ $category->package_number }}>
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
