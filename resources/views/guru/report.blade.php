<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Guru</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 align="center">LAPORAN DATA GURU</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $i => $guru)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->tempat_lahir }}</td>
                    <td>{{ $guru->tanggal_lahir }}</td>
                    <td>{{ $guru->jenis_kelamin }}</td>
                    <td>{{ $guru->jabatan }}</td>
                    <td>{{ $guru->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
