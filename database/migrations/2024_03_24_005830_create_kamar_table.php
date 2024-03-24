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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->enum('status_ketersediaan', ['booking', 'occupied', 'cleaning', 'ready']);
            $table->integer('harga'); 
            $table->unsignedBigInteger('tipe_kamar_id'); 
            $table->timestamps();

            $table->foreign('tipe_kamar_id')->references('id')->on('tipe_kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
