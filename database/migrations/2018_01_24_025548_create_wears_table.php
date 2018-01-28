<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->unsignedInteger('armor')->nullable();
            $table->unsignedInteger('arrows_id')->nullable();
            $table->unsignedInteger('arrows_qty')->nullable();
            $table->unsignedInteger('back')->nullable();
            $table->unsignedInteger('feet')->nullable();
            $table->unsignedInteger('gloves')->nullable();
            $table->unsignedInteger('ring')->nullable();
            $table->unsignedInteger('helmet')->nullable();
            $table->unsignedInteger('left_hand')->nullable();
            $table->unsignedInteger('right_hand')->nullable();
            $table->unsignedInteger('necklace')->nullable();

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
