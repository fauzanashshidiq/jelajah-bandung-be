<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisatas';

    protected $primaryKey = 'id_wisata';

    protected $fillable = [
        'nama_wisata',
        'deskripsi_wisata',
        'gambar_wisata',
        'id_paket',
    ];
    
    public function paket() {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
    
}
