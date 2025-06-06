<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Siswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 align="center">LAPORAN DATA SISWA</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $i => $siswa)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->asal_sekolah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
