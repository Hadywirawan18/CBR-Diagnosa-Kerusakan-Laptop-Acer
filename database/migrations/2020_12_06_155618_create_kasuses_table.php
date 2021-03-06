<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kasus_id');
            $table->string('tipe_laptop');
            $table->string('nama_kasus');
            $table->text('solusi');
            $table->text('revise_status')->nullable();
            $table->text('revise_msg')->nullable();
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
        Schema::dropIfExists('kasus');
    }
}
