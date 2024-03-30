<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ModelReceptionist extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'receptionist';
    protected $primaryKey= 'id';
    protected $fillable=
    [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
