<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <legend>Data Siswa</legend>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        @php $no = 1; @endphp
        @foreach ($data as $siswa)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$pegawai['nama']}}</td>
            <td>{{$pegawai['kelas']}}</td>
        @endforeach
</body>
</html>