<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobons', function (Blueprint $table) {
             $table->increments('id');
    
               $table->date('start_date');
               $table->date('end_date');
              $table->double('discount_percentage')->default(0);
               $table->integer('number_use')->default(0);
                  $table->string('cobon_type')->default('');
                   $table->string('cobon_code')->default('');
                 
                //  $table->foreign('card_id')->references('id')->on('cards');
                  $table->integer('package_id')->unsigned();
               $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('cobons');
    }
}
