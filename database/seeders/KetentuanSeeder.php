<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KetentuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ketentuan')->insert([
            [
                'id' => 1,
                'heading' => 'Halo',
                'file_path' => 'ketentuan/wgveqYCo6nW5teN9T7uh0QyOmrNA1PuJAYvtxFB4.pdf',
                'created_at' => '2025-01-16 04:52:10',
                'updated_at' => '2025-01-16 04:52:20'
            ]
        ]);
    }
}
