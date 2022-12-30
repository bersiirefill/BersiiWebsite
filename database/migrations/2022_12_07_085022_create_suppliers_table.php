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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('kode_supplier', 191)->primary();
            $table->string('nama_pemilik', 191)->nullable();
            $table->string('nama_toko', 191)->nullable();
            $table->string('nomor_telepon', 191)->nullable();
            $table->string('alamat', 191)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
