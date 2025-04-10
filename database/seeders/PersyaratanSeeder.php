<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('persyaratan')->insert([
            [
                'id' => 5,
                'heading' => 'Surat Pendaftaran Bermaterai',
                'description' => 'Formulir pendaftaran yang ditandatangani dan bermeterai Rp.10.000,00',
                'file_path' => 'persyaratan/01JHHMJ5A77QZ5W6JE5AK7FZTM.pdf',
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:28:41',
                'updated_at' => '2025-01-14 05:28:41'
            ],
            [
                'id' => 6,
                'heading' => 'Pas Foto',
                'description' => 'Foto Terbaru dan berwarna ukuran 4x6',
                'file_path' => null,
                'accepted_file_types' => json_encode([".jpg", ".png"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:29:02',
                'updated_at' => '2025-01-14 05:29:02'
            ],
            [
                'id' => 7,
                'heading' => 'Bukti Ijazah Terakhir',
                'description' => 'Ijazah terakhir minimal Strata 1 (S-1) di buktikan dengan melampirkan scan pdf',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:29:22',
                'updated_at' => '2025-01-14 05:41:14'
            ],
            [
                'id' => 8,
                'heading' => 'Surat Keterangan Sehat dan Bebas Narkoba ',
                'description' => 'Surat keterangan sehat jasmani dan rohani yang dikeluarkan tim pemeriksa kesehatan dari rumah sakit Pemerintah.',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:30:13',
                'updated_at' => '2025-01-14 05:30:13'
            ],
            [
                'id' => 9,
                'heading' => 'SKCK',
                'description' => 'Surat Keterangan Catatan Kepolisian (SKCK) dari Polres/Polresta setempat',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:31:00',
                'updated_at' => '2025-01-14 05:32:17'
            ],
            [
                'id' => 10,
                'heading' => 'Surat Pernyataan Tidak Pernah Dipidana ',
                'description' => 'Surat keterangan kepolisian tidak pernah dipidana karena melakukan tindak pidana yang diancam dengan pidana 5 (lima) tahun atau lebih',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:32:58',
                'updated_at' => '2025-01-14 05:32:58'
            ],
            [
                'id' => 11,
                'heading' => 'Surat Pernyataan Tidak Menjadi Anggota Parpol',
                'description' => 'Surat Pernyataan Tidak Menjadi Anggota Partai Politik Selama 5 tahun terakhir',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:33:46',
                'updated_at' => '2025-01-14 05:33:46'
            ],
            [
                'id' => 12,
                'heading' => 'Surat Pernyataan Melepas Jabatan',
                'description' => 'Surat Pernyataan bersedia melepaskan keanggotaan dan jabatan Dalam Badan Publik apabila diangkat menjadi anggota Komisi Informasi',
                'file_path' => 'persyaratan/01JHHMX8A8CFZ5JPDGB220643N.pdf',
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:34:45',
                'updated_at' => '2025-01-14 05:40:34'
            ],
            [
                'id' => 13,
                'heading' => 'Surat Pernyataan Bekerja Sepenuh Waktu ',
                'description' => 'Surat pernyataan bersedia bekerja penuh waktu yang ditandatangani di atas materai',
                'file_path' => 'persyaratan/01JHHMZYP8YMSGMWCM94S6EYTY.docx',
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:36:13',
                'updated_at' => '2025-01-14 05:40:02'
            ],
            [
                'id' => 14,
                'heading' => 'CV',
                'description' => 'Daftar Riwayat Hidup',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:36:52',
                'updated_at' => '2025-01-14 05:36:52'
            ],
            [
                'id' => 15,
                'heading' => 'Surat Ijin Atasan (ASN)',
                'description' => 'Harus mendapatkan ijin resmi dari atasan langsung (stempel basah) dan apabila lolos sebagai komisioner bersedia melepaskan hak gajinya selama menjadi anggota KI',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'pendukung',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:37:45',
                'updated_at' => '2025-01-14 05:37:45'
            ],
            [
                'id' => 16,
                'heading' => 'Tidak sedang menjalani hukuman disiplin (ASN)',
                'description' => 'Tidak sedang menjalani hukuman disiplin',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'pendukung',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:38:21',
                'updated_at' => '2025-01-14 05:38:21'
            ],
            [
                'id' => 17,
                'heading' => 'Penilaian Kinerja 2 Tahun (ASN)',
                'description' => 'Berkinerja dengan penilaian baik selama 2 tahun',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'pendukung',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:39:23',
                'updated_at' => '2025-01-14 05:39:23'
            ],
            [
                'id' => 18,
                'heading' => 'Surat Pernyataan Bersedia Mengundurkan Diri',
                'description' => 'Surat pernyataan kesediaan mengundurkan diri dari keanggotaan dan jabatan di Badan Publik apabila diangkat menjadi Anggota Komisi Informasi yang ditandatangani di atas materai',
                'file_path' => null,
                'accepted_file_types' => json_encode([".pdf"]),
                'status' => 'wajib',
                'max_size' => 3072,
                'created_at' => '2025-01-14 05:42:47',
                'updated_at' => '2025-01-14 05:42:47'
            ]
        ]);
    }
}
