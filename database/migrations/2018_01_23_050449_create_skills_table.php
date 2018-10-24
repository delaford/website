<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();

            $skills = ['Attack', 'Defence', 'Mining', 'Smithing', 'Fishing', 'Cooking'];

            for ($i = 0; $i < count($skills); $i++) {
                $skillName = strtolower($skills[$i]);
                $table->unsignedInteger("{$skillName}_level")->default(1);
                $table->unsignedInteger("{$skillName}_experience")->default(0);
            }

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
        Schema::dropIfExists('skills');
    }
}
