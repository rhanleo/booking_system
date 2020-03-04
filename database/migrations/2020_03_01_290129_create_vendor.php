<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('uuid')->primary();
            $table->string('admin_uuid');
            $table->string('vendor_name');
            $table->string('vendor_note');
            $table->string('vendor_contact');
            $table->string('vendor_logo');
            $table->string('vendor_email')->unique();
            $table->char('is_live',1);
            $table->timestamps();
        });
        Schema::table('vendors', function($table) {
            $table->foreign('admin_uuid')->references('uuid')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
}
