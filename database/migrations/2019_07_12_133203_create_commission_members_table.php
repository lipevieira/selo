<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('members_name', 100)->nullable();
            $table->string('members_email', 150)->nullable();
            $table->string('members_function', 60)->nullable();
            $table->string('members_phone', 20)->nullable();
            
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
        Schema::dropIfExists('commission_members');
    }
}
