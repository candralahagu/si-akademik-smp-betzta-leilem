<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use Illuminate\Support\Facades\Auth;

class SiswaTugasController extends Controller
{
    public function index()
    {
        // Ambil semua tugas
        $tugas = Tugas::latest()->get();

        // Ambil ID tugas yang sudah dikumpulkan oleh siswa ini
        $tugasTerkumpul = PengumpulanTugas::where('user_id', Auth::id())->pluck('tugas_id')->toArray();

        // Kirim ke view
        return view('siswa.tugas.index', compact('tugas', 'tugasTerkumpul'));
    }
}
