<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumuman')->insert([
            [
                'id' => 1,
                'heading' => 'Penerimaan',
                'file_path' => 'pengumuman/CV.docx',
                'created_at' => '2025-01-15 07:39:34',
                'updated_at' => '2025-01-16 04:52:49'
            ],
            [
                'id' => 2,
                'heading' => 'Penampilan',
                'file_path' => 'pengumuman/wgveqYCo6nW5teN9T7uh0QyOmrNA1PuJAYvtxFB4.pdf',
                'created_at' => '2025-01-16 04:58:07',
                'updated_at' => '2025-01-16 04:58:07'
            ]
        ]);
    }
}
