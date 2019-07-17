<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_collaborators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color',100);
            $table->integer('human_quantity');
            $table->integer('woman_quantity');

            $table->integer('human_quantity_activity_level');
            $table->integer('woman_quantity_activity_level');

            $table->string('activity_level',60);


            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions');
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
        Schema::dropIfExists('profile_collaborators');
    }
}