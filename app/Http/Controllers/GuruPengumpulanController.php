<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class GuruPengumpulanController extends Controller
{
    public function index($tugas_id)
    {
        $tugas = Tugas::with('pengumpulan.siswa')->findOrFail($tugas_id);

        return view('guru.tugas.pengumpulan', compact('tugas'));
    }
}
