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
        Schema::create('jenis_refill_riwayat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_trx', 191)->index();
            $table->string('id_produk', 191)->index();
            $table->double('jumlah_refill')->nullable();
            $table->bigInteger('harga')->nullable();
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
        Schema::dropIfExists('jenis_refill_riwayat');
    }
};
