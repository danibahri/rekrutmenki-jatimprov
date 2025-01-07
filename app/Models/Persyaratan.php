<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persyaratan extends Model
{
    use HasFactory;

    protected $table = 'persyaratan';
    protected $fillable = [
        'heading',
        'file_path',
    ];
}
