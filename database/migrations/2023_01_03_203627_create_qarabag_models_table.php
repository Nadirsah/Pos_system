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
        Schema::create('qarabag_models', function (Blueprint $table) {
            $table->id();
            $table->string('header_id');
            $table->string('name');
            $table->string('title');
            $table->string('content');
            $table->string('img');
            $table->string('slide_fon');
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
        Schema::dropIfExists('qarabag_models');
    }
};
