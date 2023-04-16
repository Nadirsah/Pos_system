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
        Schema::create('end_orders', function (Blueprint $table) {
            $table->id();
            $table->string('masa_id');
            $table->string('kategoriya');
            $table->string('miqdar');
            $table->string('price');
            $table->string('mehsul');
            $table->string('sifaris');
            $table->string('odenis');
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
        Schema::dropIfExists('end_orders');
    }
};
