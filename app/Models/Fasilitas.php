<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'included',
        'id_paket',
    ];

    public function fasilitas() {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
    
}
