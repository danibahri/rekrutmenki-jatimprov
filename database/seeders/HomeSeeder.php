<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home')->insert([
            [
                'id' => 1,
                'heading' => 'Rekrutmen Komisi Informasi Sumenep',
                'summary' => 'Panitia Seleksi Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2021-2025 mengundang warga negara Republik Indonesia yang telah memenuhi syarat untuk mendaftarkan diri melalui rekrutmen terbuka dalam rangka rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2021-2025 berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.',
                'status' => 'closed',
                'open_pendaftaran' => '2025-01-04 19:56:31',
                'exp_pendaftaran' => '2025-04-18 19:56:31',
                'email' => 'rekrutmn-ki@example.com',
                'alamat' => 'Jl. Ahmad Yani No.242-244, Gayungan, Kec. Gayungan, Kota SBY, Jawa Timur 60235',
                'telepon' => '1500117',
                'created_at' => '2025-01-05 22:57:05',
                'updated_at' => '2025-04-10 04:45:42'
            ]
        ]);
    }
}
