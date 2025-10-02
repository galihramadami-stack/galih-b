<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    //secara otomatis model ini menganggap
    //tabel yang digunakan adalah tabel 'post'

    //tabel yang digunakan untuk model ini tabel 'post'         
    protected $table = 'post';
    //apa aja yang boleh di isi
    public $fillable = ['title','content'];

    public $visible = ['id','title','content'];

    public $timestamps = true;
}
