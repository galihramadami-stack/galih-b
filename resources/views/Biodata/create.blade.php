@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Biodata</h2>

    <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan<br><br>

        <label>Agama:</label><br>
        <select name="agama">
            <option value="">-- Pilih Agama --</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="3">{{ old('alamat') }}</textarea><br><br>

        <label>Tinggi Badan (cm):</label><br>
        <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') }}"><br><br>

        <label>Berat Badan (kg):</label><br>
        <input type="number" name="berat_badan" value="{{ old('berat_badan') }}"><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto"><br><br>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection