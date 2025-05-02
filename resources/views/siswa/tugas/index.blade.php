@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h2>Daftar Tugas</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($tugas->isEmpty())
        <p>Tidak ada tugas saat ini.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Deadline</th>
                        <th>Pengumpulan</th>
                        <th>Status</th> {{-- ✅ Tambahan --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $item)
                        @php
                            $sudahKumpul = in_array($item->id, $tugasTerkumpul);
                        @endphp
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                @if ($item->file_tugas)
                                    <a href="{{ asset('storage/' . $item->file_tugas) }}" target="_blank">Download</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->deadline)->format('d-m-Y H:i') }}</td>
                            <td>
                                {{-- ✅ Hanya tampilkan form jika belum dikumpulkan --}}
                                @if (!$sudahKumpul)
                                    <form action="{{ route('siswa.tugas.kumpul') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tugas_id" value="{{ $item->id }}">
                                        <div class="d-flex flex-column gap-1">
                                            <input type="file" accept=".pdf,.doc,.docx,.zip,.png,.jpg,.jpeg" name="file_tugas" class="form-control form-control-sm" required>
                                            <button type="submit" class="btn btn-sm btn-success mt-1">Kumpulkan</button>
                                        </div>
                                    </form>
                                @else
                                    <span class="text-success">✅ Sudah dikumpulkan</span>
                                @endif
                            </td>
                            <td>
                                @if ($sudahKumpul)
                                    <span class="text-success">Sudah</span>
                                @else
                                    <span class="text-danger">Belum</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
