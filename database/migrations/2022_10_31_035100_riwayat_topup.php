<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_topup', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('id_user');
            $table->bigInteger('nominal');
            $table->dateTime('tanggal');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("riwayat_topup");
    }
};
