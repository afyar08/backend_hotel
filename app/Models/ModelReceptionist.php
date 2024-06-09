<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelReceptionist extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = 'receptionists';
    protected $primaryKey= 'id';
    protected $fillable=
    [
        'username',
        'password'
    ];

    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    public function reservasis()
    {
        return $this->hasMany(ModelReservasi::class, 'id_resepsionis', 'id');
    }

}
