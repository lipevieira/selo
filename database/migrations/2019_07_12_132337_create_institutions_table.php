<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('fantasy_name',100);
            $table->string('activity_branch',100);
            $table->string('cnpj',20);
            $table->string('county',80);
            $table->string('uf',2);
            $table->string('address',190);
            $table->string('email',150)->unique();
            $table->string('phone',20);
            $table->string('technical_manager',130);
            $table->string('formation',80);
            $table->string('phone_two',20);
            $table->string('institution_activity',60);
            $table->string('company_classification',100);
            $table->string('authorization',3);
            $table->text('action_plan');
            $table->text('partners');
            $table->text('methodology');
            $table->text('result');
            
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
        Schema::dropIfExists('institutions');
    }
}
