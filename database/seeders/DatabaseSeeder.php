<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'NewBie LocLaravel',
            'email' => 'locchuotNe18@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            RentalSeeder::class,
        ]);
    }
}
