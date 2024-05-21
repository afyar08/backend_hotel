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
            $table->dateTime('tgl_check_in');
            $table->dateTime('tgl_check_out');
            $table->unsignedBigInteger('id_tamu'); 
            $table->text('detail_tamu');
            $table->string('pembayaran');
            $table->decimal('total_bayar', 10, 2);
            $table->string('status_pembayaran');
            $table->foreign('id_tamu')->references('id')->on('guests');
            $table->foreignId('id_kamar')->constrained('kamar');
            $table->foreignId('id_resepsionis')->nullable()->constrained('receptionists');
            $table->string('room_plan')->nullable();
            $table->string('request')->nullable();
            $table->string('reservation_by')->nullable();
            $table->timestamps();
            
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
