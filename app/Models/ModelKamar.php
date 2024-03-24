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
        'status_ketersediaan',
        'harga',
        'tipe_kamar_id',
        'no_kamar'

    ];

    public function tipeKamar()
    {
        return $this->belongsTo(ModelTipeKamar::class, ' tipe_kamar_id');
    }
}
