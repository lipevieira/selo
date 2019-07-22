<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action',190);
            $table->text('activity');
            $table->integer('amount');
            $table->string('status',3)->default('NÃO');;
            $table->date('deadline');
            
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
        Schema::dropIfExists('schedules');
    }
}
