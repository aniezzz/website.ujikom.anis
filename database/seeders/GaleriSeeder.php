<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori' => 'Prestasi', 'judul' => 'Kejuaraan Lomba Pencak Silat', 'gambar' => 'galeri-1.jpeg', 'tanggal' => '2026-05-10'],
            ['kategori' => 'Kegiatan Siswa', 'judul' => 'Kegiatan Nontour', 'gambar' => 'galeri-4.jpeg', 'tanggal' => '2026-04-21'],
            ['kategori' => 'Kegiatan Siswa', 'judul' => 'Kegiatan Keagamaan', 'gambar' => 'galeri-2.jpg', 'tanggal' => '2026-05-15'],
            ['kategori' => 'Kegiatan Siswa ', 'judul' => 'Presentasi Sidang PKL', 'gambar' => 'galeri-3.jpeg', 'tanggal' => '2026-05-12'],
            ['kategori' => 'Prestasi', 'judul' => 'Kejuaraan Ajang BIA KR4BAT KOMPOS', 'gambar' => 'galeri-6.jpg', 'tanggal' => '2026-05-20'],
            ['kategori' => 'Kegiatan Siswa', 'judul' => 'Festival Budaya', 'gambar' => 'galeri-7.jpeg', 'tanggal' => '2026-05-25'],
            ['kategori' => 'Kegiatan Siswa', 'judul' => 'Upacara Bendera Setiap Hari Senin', 'gambar' => 'galeri-5.jpg', 'tanggal' => '2026-07-15'],
            ['kategori' => 'Kegiatan Siswa', 'judul' => 'Tarhib Ramadhan', 'gambar' => 'galeri-8.jpeg', 'tanggal' => '2026-03-01'],

            // FOTO BARU DITAMBAHKAN DI SINI
             ['kategori' => 'Kegiatan Siswa', 'judul' => 'Demos Paskibra', 'gambar' => 'galeri-9.jpg', 'tanggal' => '2025-06-01'],
             ['kategori' => 'Prestasi', 'judul' => 'Penerima Beasiswa Pendidikan Pt Astra', 'gambar' => 'galeri-10.jpg', 'tanggal' => '2025-08-08'],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}