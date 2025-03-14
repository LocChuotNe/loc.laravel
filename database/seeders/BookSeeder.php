<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Book::factory()->count(20)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Tắt kiểm tra khóa ngoại
        DB::table('books')->truncate(); // Xóa dữ liệu
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Bật lại kiểm tra khóa ngoại

        $books = [
            ['title' => 'Nhà Giả Kim', 'title_en' => 'The Alchemist'],
            ['title' => 'Đắc Nhân Tâm', 'title_en' => 'How to Win Friends and Influence People'],
            ['title' => 'Cuộc Sống Không Giới Hạn', 'title_en' => 'Life Without Limits'],
            ['title' => 'Bí Mật Tư Duy Triệu Phú', 'title_en' => 'Secrets of the Millionaire Mind'],
            ['title' => 'Tư Duy Nhanh và Chậm', 'title_en' => 'Thinking, Fast and Slow'],
            ['title' => 'Dám Nghĩ Lớn', 'title_en' => 'The Magic of Thinking Big'],
            ['title' => 'Bảy Thói Quen Của Người Thành Đạt', 'title_en' => 'The 7 Habits of Highly Effective People'],
            ['title' => 'Cha Giàu Cha Nghèo', 'title_en' => 'Rich Dad Poor Dad'],
            ['title' => 'Sức Mạnh Của Hiện Tại', 'title_en' => 'The Power of Now'],
            ['title' => 'Kẻ Trộm Sách', 'title_en' => 'The Book Thief'],
        ];

        foreach ($books as $book) {
            Book::create([
                'title' => $book['title'],
                'title_en' => $book['title_en'],
                'author' => 'Tác giả ' . rand(1, 5),
                'category_id' => rand(1, 3),
                'year' => rand(1990, 2023),
                'status' => rand(0, 1) ? 'in_stock' : 'out_of_stock',
                'rental_price' => rand(30000, 50000),
            ]);
        }
    }
}
