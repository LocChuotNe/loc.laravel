<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Văn học', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Khoa học', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Công nghệ', 'created_at' => now(), 'updated_at' => now()],
            
        ]);
    }
}
