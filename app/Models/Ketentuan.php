<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ketentuan extends Model
{
    use HasFactory;

    protected $table = 'ketentuan';
    protected $fillable = [
        'heading',
        'file_path',
    ];
}
