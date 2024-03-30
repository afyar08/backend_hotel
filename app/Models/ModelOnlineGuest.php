<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ModelOnlineGuest extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'online_guest';
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

    public function reservasi()
    {
        return $this->hasOne(ModelReservasi::class, 'id');
    }

}
