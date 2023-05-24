<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newproducts', function (Blueprint $table) {
                  $table->increments('id');
            $table->integer('catproducts_id')->unsigned();
            $table->string('product_name')->default(0);
              $table->string('product_link')->default(0);
                $table->string('product_image')->default('default.png');
            $table->double('product_buy_d')->default(0);
            $table->double('product_buy_E')->default(0);
             $table->double('product_sell')->default(0);
            $table->integer('Currancy')->default(0);
              $table->integer('Program_view')->default(0);
               $table->foreign('catproducts_id')->references('id')->on('catproducts')->onDelete('cascade');
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
        Schema::dropIfExists('newproducts');
    }
}
