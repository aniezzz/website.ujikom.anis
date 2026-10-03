<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\KaryaSiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLikes = Galeri::sum('likes');

        $totalBerita = Berita::count();
        $totalKarya = KaryaSiswa::count();
        $totalGaleri = Galeri::count();
        $totalPembaca = Berita::sum('views');

        return view('dashboard', compact(
            'totalLikes',
            'totalBerita',
            'totalKarya',
            'totalGaleri',
            'totalPembaca'
        ));
    }
}