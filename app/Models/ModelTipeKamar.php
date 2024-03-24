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
        'nama',
        'deskripsi'
    ];

    public function kamar()
    {
        return $this->hasMany(ModelKamar::class, 'tipe_kamar_id');
    }
}
