<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk tabel tasks (Tugas)
 */
class Task extends Model
{
    /**
     * Daftar kolom yang bisa diisi secara massal
     * 
     * @var array
     */
    protected $fillable = [
        'title',      // Judul tugas
        'description', // Deskripsi tugas
        'completed',   // Status selesai/belum
        'deadline',    // Batas waktu
    ];
}
