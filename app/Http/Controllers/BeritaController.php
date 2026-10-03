<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $featured = Berita::where('is_featured', true)->latest('tanggal')->first();
        $beritas = Berita::where('is_featured', false)->latest('tanggal')->paginate(3);

        return view('pages.berita', compact('featured', 'beritas'));
    }

   public function show($id)
{
    $berita = Berita::findOrFail($id);

    // Tambah 1 pembaca setiap kali detail berita dibuka
    $berita->increment('views');

    $terpopuler = Berita::where('id', '!=', $id)
        ->latest('tanggal')
        ->take(3)
        ->get();

    return view('pages.berita-detail', compact('berita', 'terpopuler'));
}

    // ADMIN: Tampilkan semua berita di Dashboard
    public function adminIndex()
    {
        $beritas = Berita::latest('tanggal')->get();
        return view('dashboard.berita.index', compact('beritas'));
    }

    // ADMIN: Tampilkan form tambah berita
    public function create()
    {
        return view('dashboard.berita.create');
    }

    // ADMIN: Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string',
            'tanggal' => 'required|date',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'required|image|max:10240', 
            'is_featured' => 'nullable',
        ]);

        $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images'), $namaFile);

        Berita::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'gambar' => [$namaFile],
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect('/dashboard/berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    // ADMIN: Tampilkan form edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.berita.edit', compact('berita'));
    }

    // ADMIN: Update berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string',
            'tanggal' => 'required|date',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
             'gambar' => 'nullable|image|max:10240',
            'is_featured' => 'nullable',
        ]);

        $dataUpdate = [
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $namaFile);
            $dataUpdate['gambar'] = [$namaFile];
        }

        $berita->update($dataUpdate);

        return redirect('/dashboard/berita')->with('success', 'Berita berhasil diperbarui.');
    }

    // ADMIN: Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect('/dashboard/berita')->with('success', 'Berita berhasil dihapus.');
    }
}