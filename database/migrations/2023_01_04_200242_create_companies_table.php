<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name');
            $table->longText('email');
            $table->longText('phone');
            $table->longText('location');
            $table->longText('favicon');
            $table->longText('logo');
            $table->longText('facebook');
            $table->longText('linkedin');
            $table->longText('instagram');
            $table->timestamps();
            $table->longText('short_desc')->nullable();
            $table->longText('about_title')->nullable();
            $table->longText('about')->nullable();
            $table->longText('about_image')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('main_content')->nullable();
            $table->longText('main_image')->nullable();
            $table->longText('why_us')->nullable();
            $table->longText('why_us_content')->nullable();
            $table->longText('why_us_image')->nullable();
            $table->longText('privacy')->nullable();
            $table->integer('distance_charges');
            $table->integer('frieght');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
