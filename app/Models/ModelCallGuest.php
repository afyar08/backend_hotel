<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ModelCallGuest extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'call_guest';
    protected $primaryKey= 'id';
    protected $fillable=
    [
        'nama',
        'no_telp'
    ];

    public function reservasi()
    {
        return $this->hasOne(ModelReservasi::class, 'id');
    }

}
