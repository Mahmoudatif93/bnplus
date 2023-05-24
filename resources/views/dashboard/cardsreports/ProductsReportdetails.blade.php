@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Products Orders</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">Products Orders</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.products') <small></small></h3>

               
                   
                </div><!-- end of box header -->

                <div class="box-body">


 <?php  $orders_details=DB::select("select * from products_order_details where new_products_order_id='$orders->id'");
 $basketid=$orders_details[0]->productsbaskets_id;
 ?>
 <?php  $baskets=DB::select("select * from productsbaskets where id='$basketid'");
 ?>

 

                    @if (isset($baskets) > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>@lang('site.product_name')</th>
                                <th>@lang('site.product_link')</th>
                                <th>@lang('site.product_buy_d')</th>
                                <th>@lang('site.product_buy_E')</th>
                                <th>@lang('site.product_sell')</th>
                                <th>@lang('site.product_sell_do')</th>
                                
                                <th>@lang('site.currancy')</th>
                                     <th>@lang('site.Program_view')</th>
                            
                            </tr>
                            </thead>



                            <tbody>
                            @foreach ($baskets as $index=>$basket)
                                <tr>
                                 
                                    
                                <?php  
                              
                                $products=DB::select("select * from newproducts where id='$basket->newproducts_id'");?>
 @foreach( $products as $index=>$category)
                                      
                                        
                               
                                    <td>{{ $category->product_name }}</td>
                                     <td>{{ $category->product_link }}</td>
                                        <td>{{ $category->product_buy_d }}</td>
                                           <td>{{ $category->product_buy_E }}</td>
                                              <td>{{ $category->product_sell }}</td>
                            <td>{{ $category->product_sell_do }}</td>
                                              
                                              
                                    <td>
                                    @if($category->Currancy==1)
                                    @lang('site.EG')
                                    @elseif($category->Currancy==2)
                                    @lang('site.DO')
                                    @endif
                                    </td>
                                        <td>
                                    @if($category->Program_view==0)
                                    @lang('site.all')
                                    @elseif($category->Program_view==1)
                                    @lang('site.usersapp')
                                     @elseif($category->Program_view==2)
                                    @lang('site.compapp')
                                    @endif

                                    </td>
                               @endforeach


                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{-- $Cards->appends(request()->query())->links() --}}

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
