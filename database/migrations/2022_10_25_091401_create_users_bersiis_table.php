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
            $table->string('id')->primary();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('password')->nullable();
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
