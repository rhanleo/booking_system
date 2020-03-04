<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('basket_uuid')->primary();
            $table->string('customer_uuid');  
            $table->string('vendor_uuid');
            $table->string('package_uuid');            
            $table->string('package_quantities');
            $table->float('package_rates', 8, 2);
            $table->float('package_rates_total', 8, 2);
            $table->timestamps();
        });
        Schema::table('basket', function($table) {           
            $table->foreign('vendor_uuid')->references('uuid')->on('vendors');
            $table->foreign('package_uuid')->references('package_uuid')->on('packages');
            $table->foreign('customer_uuid')->references('uuid')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket');
    }
}
