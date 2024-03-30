<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isManager()
    {
        return $this->role === 'manager';
    }

    public function isResepsionis()
    {
        return $this->role === 'resepsionis';
    }

    public function reservasi()
    {
        return $this->hasMany(ModelReservasi::class, 'id_resepsionis');
    }
}
