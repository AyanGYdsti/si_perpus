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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->string('jurusan');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
