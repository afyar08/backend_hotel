<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLaundry extends Model
{
    use HasFactory;
    protected $table = 'layanan_laundry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'berat',
        'harga',
        'deskripsi',
    ];
}
