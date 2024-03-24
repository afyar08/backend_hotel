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
        Schema::create('layanan_laundry', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_reservasi')->nullable(); // Kolom ini seharusnya merujuk ke tabel reservasi
            $table->timestamps();

            // Perbaikan: Menggunakan id_reservasi sebagai foreign key
            $table->foreign('id_reservasi')->references('id')->on('reservasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_laundry');
    }
};
