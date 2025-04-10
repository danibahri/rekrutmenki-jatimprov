<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            [
                'id' => 1,
                'heading' => 'Cara Daftar',
                'summary' => '<p>Daftar saja mah</p>',
                'created_at' => '2025-01-16 04:53:12',
                'updated_at' => '2025-01-16 04:53:12'
            ]
        ]);
    }
}
