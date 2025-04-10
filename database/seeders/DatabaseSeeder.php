<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
       $this->call([
            UserSeeder::class,
            HomeSeeder::class,
            AlurPendaftaranSeeder::class,
            FAQSeeder::class,
            KetentuanSeeder::class,
            PengumumanSeeder::class,
            PersyaratanSeeder::class,
            UserProfileSeeder::class,
            UserProfilePersyaratanSeeder::class,
        ]);
    }
}
