<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelReservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_check_in',
        'tgl_check_out',
        'id_tamu',
        'detail_tamu',
        'pembayaran',
        'total_bayar',
        'status_pembayaran',
        'id_kamar',
        'id_resepsionis',
    ];

    public function kamar()
    {
        return $this->belongsTo(ModelKamar::class, 'id_kamar');
    }

    
    // Relasi dengan model ModelResepsionis
    public function resepsionis()
    {
        return $this->belongsTo(ModelReceptionist::class, 'id_resepsionis');
    }

    public function tamu()
    {
        return $this->belongsTo(ModelGuest::class, 'id_tamu');
    }
}
