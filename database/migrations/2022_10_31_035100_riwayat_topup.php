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
            $table->string('id_user')->index()->nullable();
            $table->string('topup_id')->nullable();
            $table->decimal('nominal', 10, 2)->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->enum('payment_status', ['1', '2', '3'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa')->nullable();
            $table->string('snap_token', 36)->nullable();
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
        Schema::dropIfExists("riwayat_topup");
    }
};
