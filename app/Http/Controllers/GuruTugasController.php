<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruTugasController extends Controller
{
    // Menampilkan daftar semua tugas
    public function index()
    {
        $tugas = Tugas::latest()->get();
        return view('guru.tugas.index', compact('tugas'));
    }

    // Form untuk unggah tugas baru
    public function create()
    {
        return view('guru.tugas.create');
    }

    // Simpan tugas baru ke database
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'deadline' => 'nullable|date',
        ]);

        if ($request->hasFile('file_tugas')) {
            $data['file_tugas'] = $request->file('file_tugas')->store('tugas', 'public');
        }

        Tugas::create($data);
        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil diunggah!');
    }

    // Tampilkan form edit tugas
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('guru.tugas.edit', compact('tugas'));
    }

    // Update data tugas
    public function update(Request $request, $id)
    {
        $tugas = Tugas::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx',
            'deadline' => 'nullable|date',
        ]);

        if ($request->hasFile('file_tugas')) {
            // Hapus file lama
            if ($tugas->file_tugas) {
                Storage::disk('public')->delete($tugas->file_tugas);
            }

            $data['file_tugas'] = $request->file('file_tugas')->store('tugas', 'public');
        }

        $tugas->update($data);

        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Hapus tugas
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        // Hapus file jika ada
        if ($tugas->file_tugas) {
            Storage::disk('public')->delete($tugas->file_tugas);
        }

        $tugas->delete();

        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}

