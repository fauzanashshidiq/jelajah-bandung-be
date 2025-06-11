<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kegiatans';
    protected $primaryKey = 'id_kegiatan'; // <== ini penting
    public $timestamps = false;
    protected $fillable = ['hari', 'kegiatan', 'id_paket'];

    public function jadwalKegiatans() {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
    
}
