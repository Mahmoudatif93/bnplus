<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsbasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsbaskets', function (Blueprint $table) {
                   $table->increments('id');
            $table->integer('newproducts_id')->unsigned();
            $table->string('client_id')->nullable();
            $table->integer('amount')->default(0);
            $table->double('total_price', 8, 2)->nullable();
            $table->foreign('newproducts_id')->references('id')->on('newproducts')->onDelete('cascade');;
             $table->softDeletes();
            
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
        Schema::dropIfExists('productsbaskets');
    }
}
