<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramKeahlian;

class ProgramKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        ProgramKeahlian::create([
            'kategori' => 'Teknik Industri',
            'nama' => 'Teknik Pengelasan & Fabrikasi Logam (TPFL)',
            'gambar' => 'program-pengelasan.jpeg',
            'deskripsi' => 'Program TPFL melatih siswa dalam teknik penyambungan logam dan fabrikasi konstruksi logam. Fokus utama meliputi berbagai metode pengelasan (SMAW, GMAW, GTAW), pembacaan gambar teknik, dan penggunaan mesin-mesin industri berat untuk menciptakan komponen struktural yang presisi.',
            'kompetensi' => ['Advanced Welding (SMAW/TIG)', 'Metal Fabrication', 'Technical Drawing & CAD', 'Industrial Safety (K3)'],
            'prospek_karir' => ['Certified Welder', 'Fabrication Foreman', 'QC Inspector', 'Marine/Civil Constructor'],
        ]);

        ProgramKeahlian::create([
            'kategori' => 'Teknologi Informasi',
            'nama' => 'Pengembangan Perangkat Lunak & Gim (PPLG)',
            'gambar' => 'program-rpl.jpg',
            'deskripsi' => 'Program ini membekali siswa dengan keahlian dalam perancangan, pembuatan, dan pengujian perangkat lunak serta aplikasi game. Siswa dilatih logika pemrograman tingkat lanjut, manajemen basis data, hingga implementasi teknologi web dan mobile terkini.',
            'kompetensi' => ['Web Development', 'Mobile App (Android/iOS)', 'Game Development', 'UI/UX Design'],
            'prospek_karir' => ['Software Engineer', 'Fullstack Developer', 'Game Programmer', 'Data Scientist'],
        ]);

        ProgramKeahlian::create([
            'kategori' => 'Teknologi Informasi',
            'nama' => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
            'gambar' => 'program-tjkt.jpg',
            'deskripsi' => 'TJKT berfokus pada instalasi, konfigurasi, dan pemeliharaan infrastruktur jaringan komputer dan sistem telekomunikasi. Siswa dibekali kemampuan mendesain topologi jaringan, keamanan siber, administrasi server, hingga teknologi cloud computing.',
            'kompetensi' => ['Network Engineering', 'Cyber Security', 'Server Administration', 'Fiber Optic Tech'],
            'prospek_karir' => ['Network Administrator', 'System Integrator', 'Cloud Engineer', 'IT Support Specialist'],
        ]);

        ProgramKeahlian::create([
            'kategori' => 'Teknik Otomotif',
            'nama' => 'Teknik Kendaraan Ringan Otomotif (TKRO)',
            'gambar' => 'program-otomotif.png',
            'deskripsi' => 'TKRO membekali siswa dengan keterampilan teknis merawat, memperbaiki, dan mendiagnosis mesin kendaraan roda empat. Kurikulum mencakup sistem kelistrikan otomotif, manajemen mesin diesel, hingga penggunaan alat diagnostik modern (EFI).',
            'kompetensi' => ['Engine Overhaul', 'Automotive Electrical', 'Chassis Management', 'EFI Diagnostics'],
            'prospek_karir' => ['Automotive Technician', 'Service Advisor', 'Spare Parts Manager', 'Automotive Entrepreneur'],
        ]);
    }
}