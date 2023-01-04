<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naxcivan_models', function (Blueprint $table) {
            $table->id();
            $table->string('header_id');
            $table->string('title');
            $table->string('city');
            $table->string('area');
            $table->string('people');
            $table->string('city_image');
            $table->string('area_image');
            $table->string('people_image');
            $table->string('city_text');
            $table->string('area_text');
            $table->string('people_text');

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
        Schema::dropIfExists('naxcivan_models');
    }
};
