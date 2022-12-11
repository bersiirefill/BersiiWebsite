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
        Schema::create('refill_stations', function (Blueprint $table) {
            $table->string('nomor_seri')->primary();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->enum('status_mesin', ['0', '1', '2'])->comment('0=tidak aktif, 1=aktif, 2=maintenance')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('stations');
    }
};
