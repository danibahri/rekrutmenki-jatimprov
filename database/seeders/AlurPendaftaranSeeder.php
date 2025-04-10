<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alurpendaftaran')->insert([
            [
                'id' => 1,
                'heading' => 'Halo hai',
                'summary' => 'Hai',
                'date' => '2025-01-10',
                'created_at' => '2025-01-16 04:51:49',
                'updated_at' => '2025-01-16 04:52:29'
            ]
        ]);
    }
}
