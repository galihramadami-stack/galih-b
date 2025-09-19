<!DOCTYPE html>
<html>
<head>
    <title>Status Kelulusan</title>
</head>
<body>
    <h2>Informasi Nilai</h2>
    <p>Nama: {{ $nama }}</p>
    <p>Mata Pelajaran: {{ $mapel }}</p>
    <p>Nilai: {{ $nilai }}</p>
    <p>Status: 
        @if ($nilai >= 75)
            Lulus
        @else
            Tidak Lulus
        @endif
    </p>
</body>
</html>
