<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $nama = "peter dunham"?>
    <h1>ini halaman buku </h1>
    <h2>nama saya:<?php echo $nama ?></h2>

    @php $now = date('d m y') @endphp
    <h3>hari ini tinggal {{$now}}</h3>
</body>
</html>