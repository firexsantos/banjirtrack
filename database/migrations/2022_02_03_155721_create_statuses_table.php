<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alats_id');
            $table->foreignId('alerts_id');
            $table->timestamps();
            $table->foreign('alats_id')->references('id')->on('alats');
            $table->foreign('alerts_id')->references('id')->on('alerts');
            $table->string('ketinggian_air');
            $table->string('curah_hujan');
            $table->string('temperatur_udara');
            $table->string('kelembapan_udara');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
