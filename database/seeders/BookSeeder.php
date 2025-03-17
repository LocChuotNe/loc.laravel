<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([
            ['title' => 'Đắc Nhân Tâm', 'author' => 'Dale Carnegie', 'category_id' => 1, 'stock' => 10, 'rental_price' => 5000, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Hành Trình Về Phương Đông', 'author' => 'Baird T. Spalding', 'category_id' => 1, 'stock' => 5, 'rental_price' => 7000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
