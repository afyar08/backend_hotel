<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasMany;
//use Illuminate\Database\Eloquent\Relations\HasOne;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelTamu extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = 'tamu';
    protected $primaryKey= 'id';
    protected $fillable=
    [
        'nama',
        'email',
        'password',
        'no_telp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function reservasi():HasOne
    // {

    // }
}
