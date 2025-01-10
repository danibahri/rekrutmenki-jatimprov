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
        'nik',
        'kk',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'marital_status',
        'address',
        'registrasion_latter',
        'education',
        'ijazah',
        'pas_foto',
        'cv',
        'health_letter',
        'skck',
        'non_criminal_statement',
        'non_party_statement',
        'release_statement',
        'fulltime_statement',
        'supervisor_permission',
        'performance_letter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}