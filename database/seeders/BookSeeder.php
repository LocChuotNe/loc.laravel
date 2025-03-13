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
            [
                'title' => 'Laravel for Beginners',
                'author' => 'John Doe',
                'category_id' => 1,
                'isbn' => '1234567890',
                'published_year' => 2020,
                'quantity' => 5,
                'rental_price' => 50.00,
                'status' => 'available',
            ]
        ]);
    }
}
