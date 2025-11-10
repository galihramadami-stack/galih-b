@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Biodata</h2>

    @if (session('pesan'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('pesan') }}
    </div>
    @endif

    <a href="{{ route('biodata.create') }}">+ Tambah Data</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px; width:100%;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->agama }}</td>
                <td>{{ $item->tinggi_badan }} cm</td>
                <td>{{ $item->berat_badan }} kg</td>
                <td>
                    @if($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" alt="foto" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('biodata.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('biodata.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection