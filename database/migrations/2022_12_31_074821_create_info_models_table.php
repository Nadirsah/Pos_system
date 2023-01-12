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
        Schema::create('info_models', function (Blueprint $table) {
            $table->id();
            $table->usignedBigInteger('page_id');
            $table->string('name');
            $table->string('image');
            $table->longText('content');
            $table->string('slug');
            $table->timestamps();
            $table->foreign('page_id')
            ->references('id')
            ->on('page_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_models');
    }
};
