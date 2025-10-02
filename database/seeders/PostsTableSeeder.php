<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
    ['title' => 'Tips Laravel', 'content' => 'Belajar Laravel itu seru!'],
    ['title' => 'Workout Bulanan', 'content' => 'Jadwal latihan sudah tersedia.'],
]);

    }
}
