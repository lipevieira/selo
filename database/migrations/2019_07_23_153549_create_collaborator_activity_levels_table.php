<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorActivityLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator_activity_levels', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('color', 60);
            $table->integer('human_quantity_activity_level')->nullable();
            $table->integer('woman_quantity_activity_level')->nullable();
            $table->string('activity_level', 60);

            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')
                                                                ->onUpdate('cascade')
                                                                ->onDelete('cascade');

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
        Schema::dropIfExists('collaborator_activity_levels');
    }
}
