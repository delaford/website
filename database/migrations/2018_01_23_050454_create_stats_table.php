<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();

            $table->unsignedInteger('damage_given')->default(0);
            $table->unsignedInteger('damange_taken')->default(0);
            $table->unsignedInteger('deaths')->default(0);
            $table->unsignedInteger('monsters_killed')->default(0);
            $table->unsignedInteger('times_logged')->default(0);

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
        Schema::dropIfExists('stats');
    }
}
