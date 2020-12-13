<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kasus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bobot');

            //relasi tabel kasus
            $table->bigInteger('kasus_id')->unsigned();
            $table->foreign('kasus_id')->references('id')->on('kasus');

            //relasi tabel fitur
            $table->bigInteger('fitur_id')->unsigned();
            $table->foreign('fitur_id')->references('id')->on('fitur');

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
        Schema::dropIfExists('detail_kasus');
    }
}
