<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('first_name');
            $table->longText('last_name')->nullable();
            $table->longText('email');
            $table->longText('password')->nullable();
            $table->longText('pin')->nullable();
            $table->longText('phone');
            $table->longText('address')->nullable();
            $table->longText('country')->nullable();
            $table->longText('status')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
