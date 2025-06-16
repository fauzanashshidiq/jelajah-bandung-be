<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaketWisataSeeder extends Seeder
{
    public function run(): void
    {
        $pakets = [
            [
                'nama_paket' => 'Eksplor Alam Lembang',
                'deskripsi_paket' => 'Paket wisata "Eksplor Alam Lembang" menghadirkan pengalaman mendalam menjelajahi pesona alam Lembang yang menyejukkan. Selama 3 hari 2 malam, wisatawan akan diajak untuk merasakan keindahan alam yang asri dan menyatu dengan udara pegunungan yang segar. Setiap kegiatan dirancang untuk memberikan kombinasi antara relaksasi, petualangan, dan pengalaman kuliner lokal khas pegunungan.',
                'durasi_paket' => 3,
                'gambar_paket' => 'lembang.jpg',
                'wisata' => [
                    ['nama_wisata' => 'The Lodge Maribaya', 'deskripsi_wisata' => 'The Lodge Maribaya menawarkan suasana alami dengan udara sejuk dan pemandangan hijau pegunungan. Terdapat beragam aktivitas seperti bersepeda di udara, trekking ringan, dan berfoto di spot-spot ikonik yang sangat instagramable.', 'gambar_wisata' => 'lodge.jpg'],
                    ['nama_wisata' => 'Floating Market Lembang', 'deskripsi_wisata' => 'Floating Market Lembang menyajikan pengalaman unik berbelanja makanan dari atas perahu. Pengunjung bisa menikmati berbagai jajanan khas Sunda sambil mengelilingi danau dengan suasana yang tenang dan indah.', 'gambar_wisata' => 'floating.jpg'],
                    ['nama_wisata' => 'Farmhouse Lembang', 'deskripsi_wisata' => 'Farmhouse Lembang menawarkan arsitektur Eropa yang memukau dan mini zoo yang cocok untuk keluarga. Terdapat juga kebun bunga warna-warni dan tempat menyewa kostum ala Belanda.', 'gambar_wisata' => 'farmhouse.jpg'],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Tiba di Lembang'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Floating Market'],
                    ['hari' => 1, 'kegiatan' => 'Kuliner lokal'],
                    ['hari' => 2, 'kegiatan' => 'Wisata edukasi dan foto di Farmhouse'],
                    ['hari' => 2, 'kegiatan' => 'Wisata edukasi dan foto di The Lodge Maribaya'],
                    ['hari' => 3, 'kegiatan' => 'Belanja oleh-oleh'],
                    ['hari' => 3, 'kegiatan' => 'Perjalanan pulang'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi AC Sesuai Jumlah Peserta', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 2 malam', 'included' => true],
                    ['nama_fasilitas' => 'Makan 3x sehari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1775000],
                    ['peserta' => 3, 'harga_per_peserta' => 1408000],
                    ['peserta' => 4, 'harga_per_peserta' => 1280000],
                    ['peserta' => 5, 'harga_per_peserta' => 1195000],
                    ['peserta' => 6, 'harga_per_peserta' => 1065000],
                    ['peserta' => 7, 'harga_per_peserta' => 960000],
                    ['peserta' => 8, 'harga_per_peserta' => 880000],
                ],
            ],
            [
                'nama_paket' => 'Petualangan Selatan Ciwidey',
                'deskripsi_paket' => 'Paket "Petualangan Selatan Ciwidey" menawarkan perjalanan menyusuri destinasi menakjubkan di kawasan Ciwidey yang terkenal akan keindahan alamnya. Wisatawan akan menikmati pemandangan kawah vulkanik, danau alami, serta berinteraksi dengan rusa di tengah hutan pinus. Cocok untuk keluarga dan pencinta alam.',
                'durasi_paket' => 2,
                'gambar_paket' => 'ciwidey.jpg',
                'wisata' => [
                    ['nama_wisata' => 'Kawah Rengganis Ciwidey', 'deskripsi_wisata' => 'Kawah Rengganis merupakan kawah vulkanik alami dengan pemandian air panas dan pemandangan eksotis. Suasana alam yang alami cocok untuk relaksasi dan penyegaran tubuh.', 'gambar_wisata' => 'rengganis.jpg'],
                    ['nama_wisata' => 'Situ Patenggang', 'deskripsi_wisata' => 'Danau cantik yang dikelilingi kebun teh, ideal untuk berperahu dan menikmati alam. Legenda romantis Situ Patenggang menambah daya tarik tempat ini.', 'gambar_wisata' => 'patenggang.jpg'],
                    ['nama_wisata' => 'Ranca Upas', 'deskripsi_wisata' => 'Area perkemahan di hutan pinus yang juga merupakan penangkaran rusa. Pengunjung bisa memberi makan rusa langsung dan merasakan sensasi alam terbuka.', 'gambar_wisata' => 'ranca.jpg'],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Perjalanan ke Ciwidey'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Situ Patenggang'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Kawah Rengganis'],
                    ['hari' => 2, 'kegiatan' => 'Aktivitas pagi'],
                    ['hari' => 2, 'kegiatan' => 'Interaksi dengan rusa di Ranca Upas'],
                    ['hari' => 2, 'kegiatan' => 'Pulang'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi Sesuai Jumlah Peserta (standar Pariwisata, standar prokes)', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 1 malam', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Hotel / Penginapan (On Request)', 'included' => false],
                    ['nama_fasilitas' => 'Pengeluaran Pribadi', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke kota tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1265000],
                    ['peserta' => 3, 'harga_per_peserta' => 1090667],
                    ['peserta' => 4, 'harga_per_peserta' => 933000],
                    ['peserta' => 5, 'harga_per_peserta' => 833000],
                    ['peserta' => 6, 'harga_per_peserta' => 815000],
                    ['peserta' => 7, 'harga_per_peserta' => 740000],
                    ['peserta' => 8, 'harga_per_peserta' => 685000],
                ],
            ],
            [
                'nama_paket' => 'Wisata Sejarah dan Budaya Kota Bandung',
                'deskripsi_paket' => 'Paket ini mengajak wisatawan untuk menyelami nilai sejarah dan budaya yang melekat di Kota Bandung. Mulai dari tempat ikonik hingga peninggalan kolonial, setiap lokasi menyimpan cerita menarik yang sarat edukasi. Cocok untuk wisata keluarga, pelajar, maupun pelancong yang ingin mengenal lebih dalam identitas Bandung.',
                'durasi_paket' => 2,
                'gambar_paket' => 'budaya.jpg',
                'wisata' => [
                    ['nama_wisata' => 'Braga', 'deskripsi_wisata' => 'Jalan Braga merupakan kawasan legendaris yang dikenal sejak zaman kolonial. Dipenuhi bangunan berarsitektur Belanda, kafe klasik, dan galeri seni, Braga menyuguhkan suasana nostalgia sekaligus modern.', 'gambar_wisata' => 'braga.jpg'],
                    ['nama_wisata' => 'Sunan Ibu', 'deskripsi_wisata' => 'Sunan Ibu merupakan tempat spiritual yang memiliki nilai sejarah tinggi di tengah hiruk pikuk kota. Tempat ini cocok untuk kontemplasi dan mengenal akar budaya lokal.', 'gambar_wisata' => 'sunanibu.jpg'],
                    ['nama_wisata' => 'Kebun Binatang Bandung', 'deskripsi_wisata' => 'Kebun Binatang Bandung menyimpan ratusan koleksi satwa dan menjadi sarana edukasi serta hiburan keluarga. Area yang rindang dan tertata membuat pengalaman berkeliling semakin nyaman.', 'gambar_wisata' => 'zoo.jpg'],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Sunan Ibu'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Kebun Binatang'],
                    ['hari' => 2, 'kegiatan' => 'Wisata kota ke Braga'],
                    ['hari' => 2, 'kegiatan' => 'Belanja oleh-oleh'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi Sesuai Jumlah Peserta (standar Pariwisata, standar prokes)', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 1 malam', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Hotel / Penginapan (On Request)', 'included' => false],
                    ['nama_fasilitas' => 'Pengeluaran Pribadi', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke kota tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1265000],
                    ['peserta' => 3, 'harga_per_peserta' => 1090667],
                    ['peserta' => 4, 'harga_per_peserta' => 933000],
                    ['peserta' => 5, 'harga_per_peserta' => 833000],
                    ['peserta' => 6, 'harga_per_peserta' => 815000],
                    ['peserta' => 7, 'harga_per_peserta' => 740000],
                    ['peserta' => 8, 'harga_per_peserta' => 685000],
                ],
            ],
            [
                'nama_paket' => 'Lembang Heritage',
                'deskripsi_paket' => 'Paket Lembang Heritage membawa Anda menelusuri pesona Lembang yang kaya akan nuansa budaya dan keindahan alam. Mulai dari keunikan desa wisata tematik hingga hamparan kebun teh dan udara segar pegunungan, pengalaman ini menawarkan pelarian sempurna dari hiruk-pikuk kota. Nikmati beragam kegiatan edukatif, spot foto ikonik, dan suasana sejuk yang mendamaikan.',
                'durasi_paket' => 3,
                'gambar_paket' => 'lembang-heritage.jpg',
                'wisata' => [
                    [
                        'nama_wisata' => 'Dusun Bambu Lembang',
                        'deskripsi_wisata' => 'Dusun Bambu Lembang merupakan destinasi ekowisata yang menawarkan pengalaman berlibur di tengah keindahan alam pegunungan. Dengan nuansa bambu yang kental dan udara sejuk, pengunjung bisa menikmati taman tematik, danau buatan, serta restoran yang menyajikan kuliner khas Sunda sambil dikelilingi oleh pepohonan rindang. Suasana tenang dan pemandangan indah menjadikan tempat ini sangat cocok untuk bersantai dan melepaskan penat dari hiruk-pikuk kota.',
                        'gambar_wisata' => 'dusun-bambu.jpg',
                    ],
                    [
                        'nama_wisata' => 'Farmhouse Lembang',
                        'deskripsi_wisata' => 'Farmhouse Lembang memadukan keindahan alam dengan konsep wisata tematik ala Eropa. Di sini, pengunjung dapat mengenakan kostum tradisional Eropa dan berfoto di depan bangunan bergaya klasik yang fotogenik. Tempat ini juga memiliki peternakan mini, taman bunga yang tertata rapi, dan berbagai spot Instagramable yang cocok untuk liburan keluarga ataupun pasangan muda.',
                        'gambar_wisata' => 'farmhouse.jpg',
                    ],
                    [
                        'nama_wisata' => 'Floating Market Lembang',
                        'deskripsi_wisata' => 'Floating Market Lembang menawarkan pengalaman unik berbelanja dan kuliner di atas perahu-perahu yang terapung di atas danau. Dikelilingi oleh alam yang asri, pengunjung bisa mencicipi berbagai jajanan khas Bandung, menyewa kostum tradisional, dan bermain di wahana anak-anak yang edukatif. Tempat ini cocok untuk liburan keluarga yang mencari suasana berbeda namun tetap nyaman dan menyenangkan.',
                        'gambar_wisata' => 'floating-market.jpg',
                    ],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Kunjungan ke Dusun Bambu'],
                    ['hari' => 1, 'kegiatan' => 'Sesi makan siang di alam terbuka'],
                    ['hari' => 2, 'kegiatan' => 'Wisata tematik di Farmhouse'],
                    ['hari' => 2, 'kegiatan' => 'Foto dengan kostum Eropa'],
                    ['hari' => 3, 'kegiatan' => 'Belanja oleh-oleh'],
                    ['hari' => 3, 'kegiatan' => 'Menikmati kuliner di Floating Market'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi AC Sesuai Jumlah Peserta', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 2 malam', 'included' => true],
                    ['nama_fasilitas' => 'Makan 3x sehari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1775000],
                    ['peserta' => 3, 'harga_per_peserta' => 1408000],
                    ['peserta' => 4, 'harga_per_peserta' => 1280000],
                    ['peserta' => 5, 'harga_per_peserta' => 1195000],
                    ['peserta' => 6, 'harga_per_peserta' => 1065000],
                    ['peserta' => 7, 'harga_per_peserta' => 960000],
                    ['peserta' => 8, 'harga_per_peserta' => 880000],
                ],
            ],
            [
                'nama_paket' => 'Eksplor Ciwidey',
                'deskripsi_paket' => 'Eksplor Ciwidey adalah paket wisata yang memperkenalkan Anda pada keajaiban alam Bandung Selatan. Kawasan ini dikenal akan pesona alamnya yang menakjubkan, mulai dari kawah vulkanik hingga danau tenang yang dikelilingi oleh pepohonan hijau. Paket ini cocok untuk pecinta alam dan mereka yang ingin menikmati ketenangan di tengah keindahan alam.',
                'durasi_paket' => 2,
                'gambar_paket' => 'eksplor-ciwidey.jpg',
                'wisata' => [
                    [
                        'nama_wisata' => 'Kawah Rengganis Ciwidey',
                        'deskripsi_wisata' => 'Kawah Rengganis merupakan tempat wisata alam di Ciwidey yang menyuguhkan pemandangan kawah vulkanik dengan air panas alami. Suasana yang sejuk, aroma belerang yang khas, dan lingkungan yang masih alami menjadikannya lokasi favorit untuk relaksasi. Banyak pengunjung memanfaatkan air panas di sini untuk terapi kesehatan atau sekadar berendam sambil menikmati pemandangan hijau pegunungan.',
                        'gambar_wisata' => 'rengganis.jpg',
                    ],
                    [
                        'nama_wisata' => 'Situ Patenggang',
                        'deskripsi_wisata' => 'Situ Patenggang adalah danau alami yang terletak di ketinggian sekitar 1.600 meter di atas permukaan laut. Dikelilingi oleh kebun teh dan hutan tropis, danau ini menawarkan ketenangan dan keindahan alam yang luar biasa. Pengunjung bisa menyewa perahu, menikmati teh hangat di pinggir danau, dan mengunjungi Pulau Cinta yang menjadi legenda lokal.',
                        'gambar_wisata' => 'situ-patenggang.jpg',
                    ],
                    [
                        'nama_wisata' => 'Ranca Upas',
                        'deskripsi_wisata' => 'Ranca Upas adalah tempat wisata sekaligus area perkemahan yang populer di Ciwidey. Tempat ini terkenal dengan penangkaran rusa, pemandian air panas, serta hamparan padang rumput luas yang indah. Udara sejuk pegunungan dan suasana asri membuat tempat ini cocok untuk aktivitas alam seperti camping, outbound, dan tracking ringan.',
                        'gambar_wisata' => 'ranca-upas.jpg',
                    ],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Penjelajahan Kawah Rengganis'],
                    ['hari' => 1, 'kegiatan' => 'Pemandian air panas'],
                    ['hari' => 2, 'kegiatan' => 'Mengelilingi Situ Patenggang'],
                    ['hari' => 2, 'kegiatan' => 'Berinteraksi dengan rusa di Ranca Upas'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi Sesuai Jumlah Peserta (standar Pariwisata, standar prokes)', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 1 malam', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Hotel / Penginapan (On Request)', 'included' => false],
                    ['nama_fasilitas' => 'Pengeluaran Pribadi', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke kota tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1265000],
                    ['peserta' => 3, 'harga_per_peserta' => 1090667],
                    ['peserta' => 4, 'harga_per_peserta' => 933000],
                    ['peserta' => 5, 'harga_per_peserta' => 833000],
                    ['peserta' => 6, 'harga_per_peserta' => 815000],
                    ['peserta' => 7, 'harga_per_peserta' => 740000],
                    ['peserta' => 8, 'harga_per_peserta' => 685000],
                ],
            ],
            [
                'nama_paket' => 'Petualangan Alam Bebas',
                'deskripsi_paket' => 'Paket Petualangan Alam Bebas dirancang bagi mereka yang mencintai aktivitas luar ruangan dan eksplorasi. Dari keindahan tebing hingga air terjun tersembunyi, peserta akan merasakan adrenalin sekaligus kedamaian di tengah alam. Perjalanan ini menawarkan tantangan ringan dengan hadiah pemandangan yang luar biasa.',
                'durasi_paket' => 3,
                'gambar_paket' => 'petualangan-alam.jpg',
                'wisata' => [
                    [
                        'nama_wisata' => 'Tebing Keraton',
                        'deskripsi_wisata' => 'Tebing Keraton adalah spot wisata yang terkenal dengan pemandangan matahari terbit di atas lautan kabut. Terletak di kawasan Taman Hutan Raya Djuanda, dari atas tebing ini pengunjung dapat menyaksikan keindahan alam Bandung dari ketinggian. Suasana pagi hari di Tebing Keraton sangat magis dan menjadi incaran fotografer serta pecinta alam yang ingin merasakan ketenangan sambil memandangi cakrawala.',
                        'gambar_wisata' => 'tebing-keraton.jpg',
                    ],
                    [
                        'nama_wisata' => 'Stone Garden',
                        'deskripsi_wisata' => 'Stone Garden adalah taman batu purba yang terletak di dataran tinggi Citatah. Formasi batuan unik yang tersebar di area ini menciptakan lanskap dramatis yang memukau, sangat cocok untuk spot foto maupun eksplorasi geologi. Tempat ini juga menyimpan nilai sejarah dan edukasi karena diyakini merupakan dasar laut yang terangkat jutaan tahun lalu.',
                        'gambar_wisata' => 'stone-garden.jpg',
                    ],
                    [
                        'nama_wisata' => 'Curug Cinulang',
                        'deskripsi_wisata' => 'Curug Cinulang adalah air terjun kembar yang terletak di perbatasan Bandung dan Sumedang. Air terjun ini memiliki ketinggian sekitar 50 meter dan dikelilingi oleh vegetasi hijau yang menyejukkan mata. Suara gemuruh air dan udara segar menjadikan tempat ini cocok untuk penyegaran jiwa, piknik keluarga, maupun fotografi alam yang menakjubkan.',
                        'gambar_wisata' => 'curug-cinulang.jpg',
                    ],
                ],
                'jadwal' => [
                    ['hari' => 1, 'kegiatan' => 'Penjemputan'],
                    ['hari' => 1, 'kegiatan' => 'Trekking menuju Tebing Keraton'],
                    ['hari' => 1, 'kegiatan' => 'Menikmati sunrise'],
                    ['hari' => 2, 'kegiatan' => 'Jelajah formasi batu purba di Stone Garden'],
                    ['hari' => 3, 'kegiatan' => 'Menyusuri hutan menuju Curug Cinulang'],
                    ['hari' => 3, 'kegiatan' => 'Bermain air'],
                ],
                'fasilitas' => [
                    ['nama_fasilitas' => 'Transportasi AC Sesuai Jumlah Peserta', 'included' => true],
                    ['nama_fasilitas' => 'Penginapan 2 malam', 'included' => true],
                    ['nama_fasilitas' => 'Makan 3x sehari', 'included' => true],
                    ['nama_fasilitas' => 'Tiket masuk wisata', 'included' => true],
                    ['nama_fasilitas' => 'Biaya Parkir seluruh destinasi', 'included' => true],
                    ['nama_fasilitas' => 'Driver Profesional', 'included' => true],
                    ['nama_fasilitas' => 'Air Mineral 600ml 1x per hari', 'included' => true],
                    ['nama_fasilitas' => 'Drop In sesuai meeting point', 'included' => true],
                    ['nama_fasilitas' => 'Drop off sesuai finish point', 'included' => true],
                    ['nama_fasilitas' => 'Makan Selama Wisata', 'included' => false],
                    ['nama_fasilitas' => 'Tiket Masuk Diluar Program Tour', 'included' => false],
                    ['nama_fasilitas' => 'Tiket transport dari kota asal ke tujuan', 'included' => false],
                ],
                'harga' => [
                    ['peserta' => 2, 'harga_per_peserta' => 1775000],
                    ['peserta' => 3, 'harga_per_peserta' => 1408000],
                    ['peserta' => 4, 'harga_per_peserta' => 1280000],
                    ['peserta' => 5, 'harga_per_peserta' => 1195000],
                    ['peserta' => 6, 'harga_per_peserta' => 1065000],
                    ['peserta' => 7, 'harga_per_peserta' => 960000],
                    ['peserta' => 8, 'harga_per_peserta' => 880000],
                ],
            ],                                    
        ];

        foreach ($pakets as $paket) {
            $paketId = DB::table('paket_wisatas')->insertGetId([
                'nama_paket' => $paket['nama_paket'],
                'deskripsi_paket' => $paket['deskripsi_paket'],
                'durasi_paket' => $paket['durasi_paket'],
                'gambar_paket' => $paket['gambar_paket'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($paket['wisata'] as $w) {
                DB::table('wisatas')->insert([
                    'nama_wisata' => $w['nama_wisata'],
                    'deskripsi_wisata' => $w['deskripsi_wisata'],
                    'gambar_wisata' => $w['gambar_wisata'],
                    'id_paket' => $paketId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($paket['jadwal'] as $j) {
                DB::table('jadwal_kegiatans')->insert([
                    'hari' => $j['hari'],
                    'kegiatan' => $j['kegiatan'],
                    'id_paket' => $paketId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($paket['fasilitas'] as $f) {
                DB::table('fasilitas')->insert([
                    'nama_fasilitas' => $f['nama_fasilitas'],
                    'included' => $f['included'],
                    'id_paket' => $paketId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($paket['harga'] as $h) {
                DB::table('hargas')->insert([
                    'peserta' => $h['peserta'],
                    'harga_per_peserta' => $h['harga_per_peserta'],
                    'id_paket' => $paketId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
