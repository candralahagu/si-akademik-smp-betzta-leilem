@extends('layout.layout')

@section('content')
<div class="container">
    <h2>Edit Tugas</h2>
    <form action="{{ route('guru.tugas.update', $tugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $tugas->judul }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $tugas->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Deadline</label>
            <input type="datetime-local" name="deadline" class="form-control" value="{{ \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i') }}">
        </div>

        <div class="mb-3">
            <label>File Tugas (Opsional)</label>
            <input type="file" name="file_tugas" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
