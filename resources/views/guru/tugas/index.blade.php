@extends('layout.layout') {{-- Pastikan ini sesuai dengan layout utama kamu --}}

@section('content')
<div class="container mt-4">
    <h2>Daftar Tugas yang Diunggah</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('guru.tugas.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Tambah Tugas
    </a>

    @if ($tugas->isEmpty())
        <p>Belum ada tugas yang diunggah.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Deadline</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                @if ($item->file_tugas)
                                    <a href="{{ asset('storage/' . $item->file_tugas) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-file-download"></i> Download
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->deadline)->format('d-m-Y H:i') }}</td>
                            <td class="d-flex gap-1 flex-wrap">
                                {{-- Lihat Pengumpulan --}}
                                <a href="{{ route('guru.tugas.pengumpulan', $item->id) }}" class="btn btn-sm btn-primary" title="Lihat Pengumpulan">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit Tugas --}}
                                <a href="{{ route('guru.tugas.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit Tugas">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Hapus Tugas --}}
                                <form action="{{ route('guru.tugas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Tugas">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
