<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('about', function () {
    return '<h1>Hallo</h1>' .
        '<br>Selamat datang di perpustakaan digital';
});


Route::get('buku', function () {
    return view('buku');
});


Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'bala-bala', 'harga' => 2000, 'jumlah' => 10],
        ['nama_makanan' => 'gehu pedas', 'harga' => 2000, 'jumlah' => 15],
        ['nama_makanan' => 'cireng', 'harga' => 1500, 'jumlah' => 5],
    ];
    $resto = 'Warung Samsu - Penuh Bilatung';
    return view('menu', compact('data', 'resto'));
});


Route::get('book/{judul}', function ($judul) {
    return 'Judul buku: ' . $judul;
});


Route::get('post/{title}/{category}', function ($title, $category) {
    return view('post', ['judul' => $title, 'cat' => $category]);
});


Route::get('profile/{nama?}', function ($nama = 'galih') {
    return 'Hallo nama saya: ' . $nama;
});

Route::get('/barang-total', function () {
    $barang = [
        ['nama' => 'Buku', 'harga' => 15000, 'jumlah' => 2],
        ['nama' => 'Pensil', 'harga' => 3000, 'jumlah' => 5],
        ['nama' => 'Penggaris', 'harga' => 7000, 'jumlah' => 1],
    ];
    return view('barang-total', compact('barang'));
});

Route::get('/nilai/{nama}/{mapel}/{nilai}', function ($nama, $mapel, $nilai) {
    return view('kelulusan', compact('nama', 'mapel', 'nilai'));
});
Route::get('/grading/{nama?}/{nilai?}', function ($nama = 'iman', $nilai = 96) {
    return view('grading', compact('nama', 'nilai'));
});

Route::get('nilai-ratarata', function () {
    $siswa = [
        ['nama' => 'asep', 'nilai' => 85],
        ['nama' => 'mono', 'nilai' => 70],
        ['nama' => 'gimen', 'nilai' => 95],
    ];
    return view('ratarata', compact('siswa'));
});

