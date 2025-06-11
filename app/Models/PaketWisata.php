<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_paket';

    protected $fillable = ['nama_paket', 'deskripsi_paket', 'durasi_paket', 'gambar_paket'];

    public function wisatas() {
        return $this->hasMany(Wisata::class, 'id_paket');
    }
    
    public function jadwalKegiatans() {
        return $this->hasMany(JadwalKegiatan::class, 'id_paket');
    }
    
    public function fasilitas() {
        return $this->hasMany(Fasilitas::class, 'id_paket');
    }
    
    public function hargas() {
        return $this->hasMany(Harga::class, 'id_paket');
    }
    
}
