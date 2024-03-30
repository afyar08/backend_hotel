<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTipeKamar extends Model
{
    use HasFactory;
    protected $table = 'tipe_kamar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bed_tipe',
        'nama_tipe',
        'kapasitas_ruangan',
        'deskripsi',
    ];

    public function kamars()
    {
        return $this->hasMany(ModelKamar::class, 'tipe_kamar_id');
    }
}
