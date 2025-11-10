@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Biodata</h2>

    <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $biodata->nama) }}"><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $biodata->tgl_lahir) }}"><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jk" value="Laki-laki" {{ $biodata->jk == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
        <input type="radio" name="jk" value="Perempuan" {{ $biodata->jk == 'Perempuan' ? 'checked' : '' }}> Perempuan<br><br>

        <label>Agama:</label><br>
        <select name="agama">
            @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
            <option value="{{ $agm }}" {{ $biodata->agama == $agm ? 'selected' : '' }}>{{ $agm }}</option>
            @endforeach
        </select><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="3">{{ old('alamat', $biodata->alamat) }}</textarea><br><br>

        <label>Tinggi Badan (cm):</label><br>
        <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan', $biodata->tinggi_badan) }}"><br><br>

        <label>Berat Badan (kg):</label><br>
        <input type="number" name="berat_badan" value="{{ old('berat_badan', $biodata->berat_badan) }}"><br><br>

        <label>Foto:</label><br>
        @if ($biodata->foto)
        <img src="{{ asset('storage/'.$biodata->foto) }}" alt="foto" width="80"><br>
        @endif
        <input type="file" name="foto"><br><br>

        <button type="submit">Update</button>
    </form>
</div>
@endsection