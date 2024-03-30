<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRestorant extends Model
{
    use HasFactory;
    protected $table = 'layanan_restoran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_makanan',
        'harga',
        'deskripsi',
    ];
}
