<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alurpendaftaran extends Model
{
    use HasFactory;

    protected $table = 'alurpendaftaran';
    protected $fillable = [
        'heading',
        'date',
        'summary',
    ];

}
