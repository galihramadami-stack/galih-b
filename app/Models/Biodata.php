<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
   protected $visible = [

    'nama',
    'tgl_lahir',
    'jk',
    'agama',
    'alamat',
    'tinggi_badan',
    'berat_badan',
    'foto',
];  
}