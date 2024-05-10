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
        'gambar',
    ];

    // Aturan validasi unik untuk kolom 'nama_tipe'
    public static $rules = [
        'nama_tipe' => 'unique:tipe_kamar,nama_tipe',
    ];

    // Aturan validasi unik di atas menggunakan format pesan berikut
    public static $messages = [
        'nama_tipe.unique' => 'Nama tipe kamar sudah ada dalam database.',
    ];
    

    public function kamars()
    {
        return $this->belongsTo(ModelKamar::class, 'tipe_kamar_id', 'id');
    }
}
