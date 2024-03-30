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
        'detail_tamu',
        'pembayaran',
        'total_bayar',
        'status_pembayaran',
        'id_kamar',
        'id_tamu',
        'id_resepsionis',
    ];

    public function kamar()
    {
        return $this->belongsTo(ModelKamar::class, 'id_kamar');
    }

    // Relasi dengan model guest
    public function guest()
{
    // Periksa apakah ada ID tamu online
    if ($this->id_tamu) {
        $onlineGuest = ModelOnlineGuest::find($this->id_tamu);
        if ($onlineGuest) {
            return $this->belongsTo(ModelOnlineGuest::class, 'id_tamu');
        }
    }

    // Periksa apakah ada ID tamu call
    if ($this->id_tamu) {
        $callGuest = ModelCallGuest::find($this->id_tamu);
        if ($callGuest) {
            return $this->belongsTo(ModelCallGuest::class, 'id_tamu');
        }
    }

    // Jika tidak ada ID tamu online atau ID tamu call, kembalikan null
    return null;
}



    // Relasi dengan model ModelResepsionis
    public function resepsionis()
    {
        return $this->belongsTo(ModelReceptionist::class, 'id_resepsionis');
    }
}
