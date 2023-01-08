<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerColAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('type')->default(1);
            $table->longText('latitude')->nullable();
            $table->longText('longitude')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('service')->nullable();
            $table->longText('schedule')->nullable();
            $table->longText('image')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
