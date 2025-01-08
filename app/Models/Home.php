<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $table = 'home';
    protected $fillable = [
        'heading',
        'summary',
        'status',
        'open_pendaftaran',
        'exp_pendaftaran',
        'email',
        'alamat',
        'telepon',
    ];

    // // Relasi One-to-Many ke tabel pengumuman
    // public function pengumuman()
    // {
    //     return $this->hasMany(Pengumuman::class, 'home_id');
    // }

    // // Relasi One-to-Many ke tabel alur_pendaftaran
    // public function alurPendaftaran()
    // {
    //     return $this->hasMany(Alurpendaftaran::class, 'home_id');
    // }

    // // Relasi One-to-Many ke tabel faq
    // public function faq()
    // {
    //     return $this->hasMany(Faq::class, 'home_id');
    // }
}
