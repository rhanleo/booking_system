<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('package_uuid')->primary();
            $table->string('vendor_uuid');
            $table->string('package_name');
            $table->string('package_description');
            $table->float('rates', 8, 2);
            $table->enum('is_live',['N', 'Y'])->default('Y');
            $table->timestamps();
        });
        Schema::table('packages', function($table) {            
            $table->foreign('vendor_uuid')->references('uuid')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
