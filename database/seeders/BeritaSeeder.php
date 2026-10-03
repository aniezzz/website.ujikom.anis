<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Berita::create([
            'kategori' => 'Prestasi',
            'judul' => 'Siswa SMK Negeri 4 Bogor Menangkan Kompetisi Robotik Tingkat Nasional 2024',
            'penulis' => 'Admin Sekolah',
            'tanggal' => '2026-05-24',
            'ringkasan' => 'Kabar membanggakan datang dari tim robotik SMKN 4 Bogor yang berhasil meraih juara pada kompetisi tingkat nasional.',
            'gambar' => ['berita-featured-1.jpg', 'berita-featured-2.jpg', 'berita-featured-3.jpg'],
            'is_featured' => true,
        ]);

     Berita::create([
    'kategori' => 'Kegiatan',
    'judul' => 'SMK Negeri 4 Bogor Gelar Kegiatan Kurban Iduladha 1447 Hijriah',
    'penulis' => 'Admin',
    'tanggal' => '2026-05-16',
    'ringkasan' => 'SMKN 4 Bogor melaksanakan kegiatan penyembelihan hewan kurban dalam rangka memperingati Hari Raya Iduladha.',
    'isi' => "SMK Negeri 4 Bogor melaksanakan kegiatan penyembelihan hewan kurban sebagai bagian dari peringatan Hari Raya Idul Adha. Kegiatan ini diikuti oleh warga sekolah dan berlangsung dengan penuh kebersamaan. Hewan kurban yang telah disiapkan kemudian disembelih dan dagingnya dibagikan kepada warga sekolah serta masyarakat sekitar yang membutuhkan.\n\nKegiatan kurban tidak hanya menjadi bentuk ibadah, tetapi juga menjadi sarana untuk menumbuhkan rasa kepedulian, berbagi, dan gotong royong di lingkungan sekolah. Para siswa turut terlibat dalam kegiatan dengan membantu proses persiapan hingga pembagian daging kurban.\n\n> Kegiatan kurban menjadi momentum bagi seluruh warga SMK Negeri 4 Bogor untuk meningkatkan kepedulian, kebersamaan, dan semangat berbagi kepada sesama.|Drs. Mulya Murprihartono, M.Si., Kepala Sekolah SMKN 4 Bogor\n\n## Semangat Berbagi dan Kebersamaan\n\nKegiatan kurban di SMK Negeri 4 Bogor berlangsung dengan penuh kebersamaan. Para siswa dan warga sekolah turut berpartisipasi dalam mempersiapkan serta membantu proses kegiatan hingga pembagian daging kurban kepada masyarakat yang membutuhkan.\n\nDiharapkan kegiatan ini dapat terus menjadi bagian dari pembentukan karakter siswa SMK Negeri 4 Bogor agar memiliki kepedulian sosial, rasa tanggung jawab, serta semangat gotong royong dalam kehidupan sehari-hari.",  
    'gambar' => ['berita-1.jpg'],
    'is_featured' => false,
]);

        Berita::create([
    'kategori' => 'Prestasi',
    'judul' => 'SMKN 4 Bogor Raih Prestasi LKS Tingkat Kota Bogor',
    'penulis' => 'Admin',
    'tanggal' => '2026-05-12',
    'ringkasan' => 'Siswa SMKN 4 Bogor berhasil meraih prestasi dalam Lomba Kompetensi Siswa (LKS) Tingkat Kota Bogor bidang keahlian Teknik Otomotif.',
    'isi' => "Siswa SMK Negeri 4 Bogor kembali menorehkan prestasi membanggakan dalam ajang Lomba Kompetensi Siswa (LKS) Tingkat Kota Bogor. Kompetisi ini diikuti oleh perwakilan siswa terbaik dari bidang keahlian Teknik Otomotif setelah melalui seleksi ketat di tingkat sekolah.\n\nDalam perlombaan tersebut, siswa diuji kemampuannya dalam mendiagnosis kerusakan kendaraan, melakukan perbaikan sesuai standar industri, hingga penerapan keselamatan kerja selama proses pengerjaan berlangsung.\n\n> Prestasi ini adalah bukti nyata bahwa pembelajaran berbasis kompetensi yang kami terapkan mampu bersaing di tingkat kota.|Kepala Program Keahlian Teknik Otomotif\n\n## Persiapan yang Matang\n\nKeberhasilan ini tidak lepas dari persiapan intensif yang dilakukan siswa bersama pembimbing selama beberapa bulan terakhir, meliputi pendalaman teori maupun praktik langsung di bengkel sekolah.\n\nPihak sekolah berharap prestasi ini dapat memotivasi siswa lain untuk terus mengasah kompetensi dan siap bersaing di tingkat yang lebih tinggi.",
    'gambar' => ['berita-2.jpeg'],
    'is_featured' => false,
]);
        Berita::create([
            'kategori' => 'Kegiatan',
            'judul' => 'SMKN 4 Bogor Gelar Kegiatan Upacara Memperingati Hari Kartini',
            'penulis' => 'Admin',
            'tanggal' => '2026-04-21',
            'ringkasan' => 'SMKN 4 Bogor melaksanakan upacara dalam rangka memperingati Hari Kartini.',
            'gambar' => ['berita-3.jpeg'],
            'is_featured' => false,
        ]);

        Berita::create([
            'kategori' => 'Kurikulum',
            'judul' => 'Workshop Literasi Digital bagi Guru dan Tenaga Kependidikan',
            'penulis' => 'Perpustakaan',
            'tanggal' => '2026-05-01',
            'ringkasan' => 'Menghadapi era transformasi pendidikan digital, sekolah menyelenggarakan workshop intensif untuk mengoptimalkan penggunaan platform pembelajaran daring.',
            'gambar' => ['galeri-1.jpeg'],
            'is_featured' => false,
        ]);

        Berita::create([
            'kategori' => 'Prestasi',
            'judul' => 'Juara 2 Lomba Karya Ilmiah Remaja Tingkat Provinsi',
            'penulis' => 'OSIS',
            'tanggal' => '2026-04-25',
            'ringkasan' => 'Siswa kami kembali mengukir prestasi gemilang melalui penelitian inovatif mengenai pemanfaatan limbah domestik sebagai sumber energi terbarukan.',
            'gambar' => ['galeri-4.jpeg'],
            'is_featured' => false,
        ]);

        Berita::create([
            'kategori' => 'Kegiatan',
            'judul' => 'Kunjungan Industri ke Pusat Data Nasional',
            'penulis' => 'ICT Center',
            'tanggal' => '2026-04-20',
            'ringkasan' => 'Mengenalkan ekosistem pusat data dan infrastruktur IT kepada siswa jurusan TKJ untuk memperluas wawasan praktis mengenai industri digital.',
            'gambar' => ['galeri-5.jpg'],
            'is_featured' => false,
        ]);
    }
}