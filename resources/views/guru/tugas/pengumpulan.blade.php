@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h3>Pengumpulan Tugas: {{ $tugas->judul }}</h3>

    @if ($tugas->pengumpulan->isEmpty())
        <p>Belum ada siswa yang mengumpulkan tugas ini.</p>
    @else
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Email</th>
                        <th>File Tugas</th>
                        <th>Waktu Pengumpulan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas->pengumpulan as $item)
                        <tr>
                            <td>{{ $item->siswa->name }}</td>
                            <td>{{ $item->siswa->email }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $item->file_tugas) }}" target="_blank">Download</a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->submitted_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
