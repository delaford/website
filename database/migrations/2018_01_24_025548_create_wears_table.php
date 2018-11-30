<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wears', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();

            $table->string('armor', 50)->nullable();
            $table->string('arrows_id', 50)->nullable();
            $table->string('arrows_qty', 50)->nullable();
            $table->string('back', 50)->nullable();
            $table->string('feet', 50)->nullable();
            $table->string('gloves', 50)->nullable();
            $table->string('head', 50)->nullable();
            $table->string('left_hand', 50)->nullable();
            $table->string('necklace', 50)->nullable();
            $table->string('right_hand', 50)->nullable();
            $table->string('ring', 50)->nullable();

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
        Schema::dropIfExists('wears');
    }
}
