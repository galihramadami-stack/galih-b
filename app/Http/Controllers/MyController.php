<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function hello()
    {
        $nama = "Galih";
        $umur = "17";

        return view('hallo', compact('nama', 'umur')); 
    }

    public function siswa()
    {
        $data = [
            ['nama'=> 'Rehan', 'kelas' => 'XI RPL 3'],
            ['nama'=> 'Satmul', 'kelas' => 'XI RPL 3'],
            ['nama'=> 'Sidik', 'kelas' => 'XI RPL 3'],
        ];

        return view('siswa', compact('data'));
    }
}
