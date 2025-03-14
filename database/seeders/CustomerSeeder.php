<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Phạm Vũ Phúc Lộc',
                'email' => 'test1@gmail.com',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'birthday' => '2000-08-18',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Trần Thị Quỳnh Trang',
                'email' => 'test2@gmail.com',
                'phone' => '0987654321',
                'address' => 'Hà Nội',
                'birthday' => '2000-10-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
