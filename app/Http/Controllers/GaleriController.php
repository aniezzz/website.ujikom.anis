<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest('tanggal')->get();
        return view('pages.galeri', compact('galeris'));
    }

    public function adminIndex()
    {
        $galeris = Galeri::latest('tanggal')->get();
        return view('dashboard.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('dashboard.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|max:10240',
        ]);

        $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images'), $namaFile);

        Galeri::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'gambar' => $namaFile,
        ]);

        return redirect('/dashboard/galeri')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('dashboard.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $dataUpdate = [
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $namaFile);
            $dataUpdate['gambar'] = $namaFile;
        }

        $galeri->update($dataUpdate);

        return redirect('/dashboard/galeri')->with('success', 'Foto berhasil diperbarui.');
    }

    // LIKE / UNLIKE GALERI
    public function like($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (request('action') === 'unlike') {
            $galeri->decrement('likes');
        } else {
            $galeri->increment('likes');
        }

        return response()->json([
            'success' => true,
            'likes' => $galeri->likes,
        ]);
    }

    public function destroy($id)
    {
        Galeri::findOrFail($id)->delete();

        return redirect('/dashboard/galeri')
            ->with('success', 'Foto berhasil dihapus.');
    }
}