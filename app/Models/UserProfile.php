<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    
    protected $table = 'user_profile';
    protected $fillable = [
        'user_id',
        'full_name',
        'birth_place',
        'birth_date',
        'nik',
        'kk_number',
        'gender',
        'religion',
        'marital_status',
        'nationality',
        'current_address',
        'permanent_address',
        'phone_number',
        'ktp_scan_path',
        'kk_scan_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}