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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kamar');
            $table->unsignedBigInteger('id_tamu');
            $table->unsignedBigInteger('id_resepsionis');
            $table->date('tgl_check_in');
            $table->date('tgl_check_out');
            $table->decimal('total_bayar', 8, 2);
            $table->string('pembayaran')->nullable();
            $table->string('status_pembayaran')->default('pending');
            $table->text('detail_tamu');
            $table->timestamps();

            $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('cascade');
            $table->foreign('id_tamu')->references('id')->on('tamu')->onDelete('cascade');
            $table->foreign('id_resepsionis')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
