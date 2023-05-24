<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobonCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobon_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('cobon_id')->unsigned();
            $table->integer('company_id')->unsigned();
                 $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                 $table->integer('card_id')->null();
                 $table->foreign('cobon_id')->references('id')->on('cobons');
                
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
        Schema::dropIfExists('cobon_companies');
    }
}
