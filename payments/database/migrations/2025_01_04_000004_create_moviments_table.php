<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moviments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_state_moviment');
            $table->unsignedBigInteger('id_user');
            $table->boolean('returned')->default('0');
            $table->integer('value');
            $table->timestamps();
            
            $table->foreign('id_state_moviment')->references('id')->on('state_moviments');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviments');
    }
};
