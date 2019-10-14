<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentRecognitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_recognitions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('doc_name');

            $table->bigInteger('institution_recognition_id')->unsigned();
            $table->foreign('institution_recognition_id')->references('id')->on('institution_recognitions');

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
        Schema::dropIfExists('document_recognitions');
    }
}
