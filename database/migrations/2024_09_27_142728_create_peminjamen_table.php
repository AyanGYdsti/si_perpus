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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('anggotas')->onDelete('cascade');
            $table->foreignId('id_buku')->constrained('bukus')->onDelete('cascade');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            $table->enum('status_peminjaman',['Dipinjam','Dikembalikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
