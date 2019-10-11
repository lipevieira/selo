<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionRecognitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_recognitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fantasy_name');
            $table->string('cnpj', 20)->unique();
            $table->string('county', 80);
            $table->string('uf', 2)->default('BA');;
            $table->string('address', 190);
            $table->string('email', 150)->unique();
            $table->string('phone', 20);
            $table->string('technical_manager', 130);
            $table->string('formation', 80);
            $table->string('phone_two', 20)->nullable();
            $table->string('institution_activity', 60);
            $table->string('company_classification', 100);
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
        Schema::dropIfExists('institution_recognitions');
    }
}
