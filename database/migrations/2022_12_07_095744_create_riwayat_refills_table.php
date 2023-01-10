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
        Schema::create('riwayat_refills', function (Blueprint $table) {
            $table->string('id_trx', 191)->primary();
            $table->string('nomor_seri', 191)->index();
            $table->string('id_user', 191)->index();
            $table->bigInteger('total_harga')->nullable();
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
        Schema::dropIfExists('riwayat_refills');
    }
};
