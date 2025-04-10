<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_profile')->insert([
            [
                'id' => 6,
                'user_id' => 1,
                'full_name' => 'Dani Bahri',
                'nik' => '2323232323232323',
                'kk' => '3232323232323232',
                'birth_place' => 'Surabaya',
                'birth_date' => '1190-11-11',
                'validation_status' => 'direview',
                'gender' => 'L',
                'religion' => 'Islam',
                'marital_status' => 'Belum Kawin',
                'address' => 'sdsdsdsdsd',
                'education' => 'S1',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-16 04:54:53'
            ]
        ]);
    }
}
