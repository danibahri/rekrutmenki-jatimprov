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

}
