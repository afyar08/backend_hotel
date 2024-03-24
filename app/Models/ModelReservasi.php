<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelReservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'id_kamar',
        'id_tamu',
        'id_resepsionis',
        'tgl_check_in',
        'tgl_check_out',
        'total_bayar',
        'pembayaran',
        'status_pembayaran',
        'detail_tamu'
    ];

    public function resepsionis()
    {
        return $this->belongsTo(User::class, 'id_resepsionis');
    }
}
