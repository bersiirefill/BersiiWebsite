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
            $table->bigIncrements('ID');
            $table->string('Name');
            $table->string('Email');
            $table->string('Number');
            $table->string('Address');
            $table->string('Password');
            $table->timestamp('Created_at')->nullable();
            $table->timestamp('Updated_at')->nullable();
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
