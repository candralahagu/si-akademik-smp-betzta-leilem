<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;
use Illuminate\Support\Carbon;

class TugasSeeder extends Seeder
{
    public function run(): void
    {
        Tugas::create([
            'judul' => 'Tugas PPKn',
            'deskripsi' => 'Tuliskan kembali isi UUD 1945 Pasal 27 dan 28',
            'file_tugas' => null,
            'deadline' => Carbon::now()->addDays(3),
        ]);

        Tugas::create([
            'judul' => 'Tugas Matematika',
            'deskripsi' => 'Kerjakan soal di halaman 25-30 buku paket',
            'file_tugas' => null,
            'deadline' => Carbon::now()->addDays(5),
        ]);
    }
}

