<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi: membuat tabel tasks
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();                                    // Kolom ID (primary key)
            $table->string('title');                        // Judul tugas
            $table->text('description')->nullable();        // Deskripsi tugas (opsional)
            $table->boolean('completed')->default(false);   // Status selesai/belum
            $table->date('deadline')->nullable();           // Batas waktu (opsional)
            $table->timestamps();                           // Created_at dan Updated_at
        });
    }

    /**
     * Batalkan migrasi: hapus tabel tasks
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
