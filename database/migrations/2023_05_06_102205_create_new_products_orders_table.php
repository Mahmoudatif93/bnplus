<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProductsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_products_orders', function (Blueprint $table) {
                       $table->increments('id');
            $table->integer('productsbaskets_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('transaction_id')->default(0);
            $table->double('total_price', 8, 2)->nullable();
            $table->string('client_name');
            $table->string('client_number');
            $table->string('paid')->default('false');
              $table->string('city')->nullable();
            $table->string('region')->nullable();
             $table->string('address_details')->nullable();
            $table->foreign('productsbaskets_id')->references('id')->on('productsbaskets');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('new_products_orders');
    }
}
