<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;



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

Route::get('test-model', function () {
    
    $data = App\Models\Post::all();
    return $data;
});

Route::get('create-data',function(){

    $data = App\Models\Post::create([
        'title' =>'kelas',
        'content' =>'lorem ipsum',
    ]);

    return $data;

});

Route::get('show-data/{id}', function ($id) {
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function($id) {
    $data          = App\Models\Post::find($id);
    $data->title   = "Membangun Project dengan Laravel";
    $data->content = "Ipsum Lorem";
    $data->save();
    return $data;
});
Route::get('delete-data/{id}', function ($id) {
    $data          = App\Models\Post::find($id);
    $data->delete();
    return redirect('test-model');
});
Route::get('search/{cari}',function ($query) {
    $data = App\Models\Post::where('title', 'like', '%' .$query . '%')->get();
    return $data;
});

Route::get('greetings',[MyController::class, 'hello']);
Route::get('student', [MyController::class, 'siswa']);
Route::get('post', [PostController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
