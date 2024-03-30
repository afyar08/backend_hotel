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
            $table->text('detail_tamu');
            $table->string('pembayaran');
            $table->decimal('total_bayar', 10, 2);
            $table->string('status_pembayaran');
            $table->foreignId('id_kamar')->constrained('kamar');
            $table->unsignedBigInteger('id_tamu_online')->nullable();
            $table->unsignedBigInteger('id_tamu_call')->nullable();
            $table->foreign('id_tamu_online')->references('id')->on('online_guests')->onDelete('cascade');
            $table->foreign('id_tamu_call')->references('id')->on('call_guests')->onDelete('cascade');
            $table->foreignId('id_resepsionis')->nullable()->constrained('receptionists');
            $table->foreignId('id_laundry')->nullable()->constrained('layanan_laundry');
            $table->foreignId('id_restorant')->nullable()->constrained('layanan_restoran');
            $table->timestamps();
            
            // Membuat unique constraint untuk memastikan hanya satu di antara id_tamu_call atau id_tamu_online yang diisi
            $table->unique(['id_tamu_online', 'id_tamu_call']);
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
