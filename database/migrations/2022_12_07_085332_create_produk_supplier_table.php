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
        Schema::create('produk_supplier', function (Blueprint $table) {
            $table->string('id_produk', 191)->primary();
            $table->string('kode_supplier', 191)->index()->nullable();
            $table->string('nama_produk', 191)->nullable();
            $table->string('deskripsi_produk', 191)->nullable();
            $table->double('stok')->nullable();
            $table->bigInteger('harga_produk')->nullable();
            $table->string('gambar_produk', 191)->nullable();
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
        Schema::dropIfExists('daftar_produks');
    }
};
