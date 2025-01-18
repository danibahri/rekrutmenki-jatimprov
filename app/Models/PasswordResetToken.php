<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordResetToken extends Model
{

    use HasFactory;

    protected $primaryKey = 'email';
    protected $table = 'password_reset_tokens';
    protected $fillable = ['email', 'token', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime'
    ];
}
