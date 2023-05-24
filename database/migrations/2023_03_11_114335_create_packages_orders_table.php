<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_orders', function (Blueprint $table) {
                 $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('transaction_id')->default(0);
            $table->double('package_price', 8, 2)->nullable();
            $table->string('client_name');
            $table->string('client_number');
            $table->string('paid')->default('false');
            $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('packages_orders');
    }
}
