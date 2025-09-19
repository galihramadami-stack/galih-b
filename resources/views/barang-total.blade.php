<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h2 style="text;">Daftar Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($barang as $item)
                @php
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3 style="text;">Total Harga: Rp {{ number_format($total, 0, ',', '.') }}</h3>
</body>
</html>
