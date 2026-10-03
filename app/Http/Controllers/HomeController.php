<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerkini = Berita::latest('tanggal')->take(3)->get();

        $galeris = Galeri::latest('created_at')->take(6)->get();
        
        return view('pages.home', compact('beritaTerkini', 'galeris'));
    }
}