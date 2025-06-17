<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonis')->insert([
            [
                'nama_pengguna' => 'Faraby',
                'isi' => 'Pengalaman saya sangat menyenangkan! Pelayanannya ramah dan tempatnya sangat nyaman.',
                'foto' => '1750158022.jpg',
            ],
            [
                'nama_pengguna' => 'Fauzan Ash',
                'isi' => 'Pelayanan yang luar biasa dan fasilitas yang disediakan sangat memuaskan. Saya pasti akan kembali lagi!',
                'foto' => '1750157992.jpeg',
            ],
            [
                'nama_pengguna' => 'Rahardian Baihaqi',
                'isi' => 'Tempat ini benar-benar sesuai dengan ekspektasi. Rekomendasi banget buat liburan bareng keluarga.',
                'foto' => '1750158012.jpg',
            ],
            [
                'nama_pengguna' => 'Nurul',
                'isi' => 'Pelayanan yang saya dapatkan sangat luar biasa. Tim pemandu wisata sangat ramah, profesional, dan selalu siap membantu kapan pun dibutuhkan. Destinasi yang ditawarkan pun benar-benar indah dan sesuai ekspektasi.',
                'foto' => null,
            ],
            [
                'nama_pengguna' => 'Nazwa Zalfa',
                'isi' => 'Saya sangat puas dengan pengalaman liburan kali ini. Paket wisata yang ditawarkan sangat lengkap, mulai dari transportasi, akomodasi, hingga jadwal kegiatan yang tertata rapi. Sangat recommended untuk yang ingin liburan tanpa repot!',
                'foto' => null,
            ],
            [
                'nama_pengguna' => 'Daffa',
                'isi' => 'Paket wisatanya sangat menyenangkan! Semua tempat yang dikunjungi indah dan pelayanan dari tim sangat baik. Cocok buat liburan keluarga.',
                'foto' => null,
            ],
        ]);
    }
}
