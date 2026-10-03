<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitasPembelajaran = Fasilitas::where('kategori', 'Fasilitas Pembelajaran')->get();
        $fasilitasPenunjang = Fasilitas::where('kategori', 'Fasilitas Penunjang')->get();

        return view('pages.layanan-fasilitas', compact('fasilitasPembelajaran', 'fasilitasPenunjang'));
    }
}