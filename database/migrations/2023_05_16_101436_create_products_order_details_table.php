<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_order_details', function (Blueprint $table) {
            $table->id();
             $table->integer('productsbaskets_id')->unsigned();
             $table->integer('new_products_order_id')->unsigned();
               $table->foreign('productsbaskets_id')->references('id')->on('productsbaskets');
            $table->foreign('new_products_order_id')->references('id')->on('new_products_orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_order_details');
    }
}
