<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;



class ModelGuest extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'guests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'kategori',
        'password',
        'activation_token', // Tambahkan kolom activation_token
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Custom mutator to ensure password is null when kategori is 'BP'
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $this->kategori === 'BP' ? null : $value;
    }
    public function idTamuReservasi()
    {
        return $this->hasOne(ModelReservasi::class, 'id_tamu', 'id');
    }
}
