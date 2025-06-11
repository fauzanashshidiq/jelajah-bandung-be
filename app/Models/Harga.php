<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_harga';

    protected $fillable = [
        'peserta',
        'harga_per_peserta',
        'id_paket',
    ];

    public function hargas() {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
    public function paket()
{
    return $this->belongsTo(PaketWisata::class, 'id_paket', 'id_paket');
}

}
