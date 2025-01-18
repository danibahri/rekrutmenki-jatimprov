<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'validation_status',
        'gender',
        'religion',
        'marital_status',
        'address',
        'education'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function persyaratans(): BelongsToMany
    {
        return $this->belongsToMany(Persyaratan::class, 'user_profile_persyaratan')
                    ->withPivot('file_path_user')
                    ->withTimestamps();
    }
}