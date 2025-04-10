<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserProfilePersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('user_profile_persyaratan')->insert([
            [
                'id' => 60,
                'user_profile_id' => 6,
                'persyaratan_id' => 5,
                'file_path_user' => 'persyaratan/surat-pendaftaran-bermaterai/1736910117_5_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 61,
                'user_profile_id' => 6,
                'persyaratan_id' => 6,
                'file_path_user' => 'persyaratan/pas-foto/1736910117_6_1_arsitektur-PSD.drawio.jpg',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 62,
                'user_profile_id' => 6,
                'persyaratan_id' => 7,
                'file_path_user' => 'persyaratan/bukti-ijazah-terakhir/1736910117_7_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 63,
                'user_profile_id' => 6,
                'persyaratan_id' => 8,
                'file_path_user' => 'persyaratan/surat-keterangan-sehat-dan-bebas-narkoba/1736910117_8_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 64,
                'user_profile_id' => 6,
                'persyaratan_id' => 9,
                'file_path_user' => 'persyaratan/skck/1736910117_9_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 65,
                'user_profile_id' => 6,
                'persyaratan_id' => 10,
                'file_path_user' => 'persyaratan/surat-pernyataan-tidak-pernah-dipidana/1736910117_10_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 66,
                'user_profile_id' => 6,
                'persyaratan_id' => 11,
                'file_path_user' => 'persyaratan/surat-pernyataan-tidak-menjadi-anggota-parpol/1736910117_11_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 67,
                'user_profile_id' => 6,
                'persyaratan_id' => 12,
                'file_path_user' => 'persyaratan/surat-pernyataan-melepas-jabatan/1736910117_12_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 68,
                'user_profile_id' => 6,
                'persyaratan_id' => 13,
                'file_path_user' => 'persyaratan/surat-pernyataan-bekerja-sepenuh-waktu/1736910117_13_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 69,
                'user_profile_id' => 6,
                'persyaratan_id' => 14,
                'file_path_user' => 'persyaratan/cv/CV.docx',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 70,
                'user_profile_id' => 6,
                'persyaratan_id' => 15,
                'file_path_user' => 'persyaratan/surat-ijin-atasan-asn/1736910117_15_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 71,
                'user_profile_id' => 6,
                'persyaratan_id' => 16,
                'file_path_user' => 'persyaratan/tidak-sedang-menjalani-hukuman-disiplin-asn/1736910117_16_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 72,
                'user_profile_id' => 6,
                'persyaratan_id' => 17,
                'file_path_user' => 'persyaratan/penilaian-kinerja-2-tahun-asn/1736910117_17_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ],
            [
                'id' => 73,
                'user_profile_id' => 6,
                'persyaratan_id' => 18,
                'file_path_user' => 'persyaratan/surat-pernyataan-bersedia-mengundurkan-diri/1736910117_18_1_CV.pdf',
                'created_at' => '2025-01-15 03:01:57',
                'updated_at' => '2025-01-15 03:01:57'
            ]
        ]);
    }
}
