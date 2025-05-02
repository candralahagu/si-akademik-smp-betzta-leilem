<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan_tugas';

    protected $fillable = [
        'user_id',
        'tugas_id',
        'file_tugas',
        'submitted_at',
    ];

    // ✅ Relasi ke user (siswa)
    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ✅ Relasi ke tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
