<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDiagnosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_diagnosa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bobot');
            $table->bigInteger('diagnosa_id')->unsigned();
            $table->bigInteger('fitur_id')->unsigned();
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
        Schema::dropIfExists('detail_diagnosa');
    }
}
