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
        Schema::create('ayarlar_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('about');
            $table->string('activ');
            $table->string('facebook');
            $table->string('telefon');

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
        Schema::dropIfExists('ayarlar_models');
    }
};
