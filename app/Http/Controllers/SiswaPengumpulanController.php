<?php

namespace App\Http\Controllers;

use App\Models\PengumpulanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaPengumpulanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'file_tugas' => 'required|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg|max:2048',
        ]);

        $path = $request->file('file_tugas')->store('pengumpulan_tugas', 'public');

        PengumpulanTugas::create([
            'user_id' => Auth::id(),
            'tugas_id' => $request->tugas_id,
            'file_tugas' => $path,
            'submitted_at' => now(),
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan!');
    }
}
