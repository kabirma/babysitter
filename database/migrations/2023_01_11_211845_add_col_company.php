<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->longText("about_subtitle")->nullable();
            $table->longText("about_box_1")->nullable();
            $table->longText("about_box_1_no")->nullable();
            
            $table->longText("about_box_2")->nullable();
            $table->longText("about_box_2_no")->nullable();
            
            $table->longText("about_box_3")->nullable();
            $table->longText("about_box_3_no")->nullable();
            
            $table->longText("about_box_4")->nullable();
            $table->longText("about_box_4_no")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
