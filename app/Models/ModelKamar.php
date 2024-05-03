<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ModelKamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status_kamar',
        'status_reservasi',
        'harga',
        'no_kamar',
        'tipe_kamar_id',
    ];

    public function tipeKamar()
    {
        return $this->belongsTo(ModelTipeKamar::class, ' tipe_kamar_id');
    }
}
