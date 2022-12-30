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
        Schema::create('users_bersiis', function (Blueprint $table) {
            $table->string('id', 191)->primary();
            $table->string('nama', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('nomor_telepon', 191)->nullable();
            $table->string('alamat', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->integer('forgot_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users_bersiis');
    }
};
