<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique()->nullable();

            $table->unsignedInteger('x')->default(14);
            $table->unsignedInteger('y')->default(108);
            $table->unsignedInteger('map')->default(1);
            $table->boolean('online')->default(false);
            $table->unsignedInteger('member_level')->default(1);

            $table->unsignedInteger('level')->default(1);
            $table->unsignedInteger('hp_current')->default(10);
            $table->unsignedInteger('hp_max')->default(10);

            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
