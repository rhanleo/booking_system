<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('order_uuid')->primary();
            $table->string('customer_uuid');
            $table->string('vendor_uuid');
            $table->string('payment_method');
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_address');
            $table->string('order_quantities');
            $table->enum('order_status',['Processing', 'Delivered'])->default('Delivered');
            $table->float('order_amount', 8, 2);
            $table->timestamps();
        });
        Schema::table('orders', function($table) {           
            $table->foreign('vendor_uuid')->references('uuid')->on('vendors');
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
        Schema::dropIfExists('orders');
    }
}
