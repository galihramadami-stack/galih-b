<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProductsTableSeeder extends Seeder
{
   
   DB::table('posts')->insert([
    ['name' => 'Item A', 'stock' => 10, 'release_date' => '2025-01-01', 'is_available' => true, 'description' => 'Produk A unggulan.', 'price' => 99.99],
    ['name' => 'Item B', 'stock' => 5, 'release_date' => '2025-02-01', 'is_available' => false, 'description' => 'Produk B terbatas.', 'price' => 149.50],
    ['name' => 'Item C', 'stock' => 20, 'release_date' => '2025-03-01', 'is_available' => true, 'description' => 'Produk C populer.', 'price' => 79.00],
    ['name' => 'Item D', 'stock' => 0, 'release_date' => '2025-04-01', 'is_available' => false, 'description' => 'Produk D habis.', 'price' => 199.99],
    ['name' => 'Item E', 'stock' => 8, 'release_date' => '2025-05-01', 'is_available' => true, 'description' => 'Produk E baru.', 'price' => 59.95],
]);

    {
        DB::table('posts')->insert($table);

    }
}
