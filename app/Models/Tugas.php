<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'file_tugas', 'deadline'];

    // ✅ Relasi ke pengumpulan tugas
    public function pengumpulan()
    {
        return $this->hasMany(PengumpulanTugas::class);
    }
}

