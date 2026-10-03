<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KaryaSiswa;

class KaryaSiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['jurusan' => 'PPLG', 'nama' => 'Kr4bat Isyarat', 'gambar' => 'karya-pplg.jpg', 'deskripsi' => 'Game idukasi berbasis scratch untuk mempelajari sistem isyarat bahasa Indonesia 
            (SIBI) melalui permainan interaktif yang menyenangkan dan mudah di pahami.', 'info_tambahan' => 'Berbasis Scartch'],
            ['jurusan' => 'PPLG', 'nama' => 'IOT Tani Pintar', 'gambar' => 'karya-tjkt.jpg', 'deskripsi' => 'Sistem ini dirancang sebagai solusi pertanian digital yang ramah anggaran (low-cost), mudah digunakan, serta mendukung ketahanan pangan yang berkelanjutan.', 'info_tambahan' => 'IoT & Sensor'],
            ['jurusan' => 'Pengelasan', 'nama' => 'Meja Kerja Hasil Fabrikasi', 'gambar' => 'karya-pengelasan.jpg', 'deskripsi' => 'Meja kerja hasil pengelasan dan fabrikasi logam siswa, dirancang kokoh untuk kebutuhan praktik dan industri.', 'info_tambahan' => 'Fabrikasi Logam'],
            ['jurusan' => 'Otomotif', 'nama' => 'Simulator Mobil Listrik', 'gambar' => 'karya-otomotif.jpg', 'deskripsi' => 'Simulator kendaraan listrik hasil karya siswa jurusan Teknik Kendaraan Ringan Otomotif, dirancang sebagai media pembelajaran sistem kendaraan berbasis listrik.', 'info_tambahan' => 'Media Pembelajaran'],
        ];

        foreach ($data as $item) {
            KaryaSiswa::create($item);
        }
    }
}