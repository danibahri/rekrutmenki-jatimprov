<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Persyaratan extends Model
{
    use HasFactory;

    protected $table = 'persyaratan';
    protected $fillable = [
        'id_user_profile',
        'heading',
        'description',
        'file_path',
        'status',
        'max_size',
        'accepted_file_types',
        
    ];

    public function setAcceptedFileTypesAttribute($value)
    {
        $this->attributes['accepted_file_types'] = json_encode($value);
    }

    public function getAcceptedFileTypesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function userProfiles(): BelongsToMany
    {
        return $this->belongsToMany(UserProfile::class, 'user_profile_persyaratan')
                    ->withPivot('file_path_user')
                    ->withTimestamps();
    }
}
