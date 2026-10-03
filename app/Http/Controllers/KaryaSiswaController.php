<?php

namespace App\Http\Controllers;

use App\Models\KaryaSiswa;
use Illuminate\Http\Request;

class KaryaSiswaController extends Controller
{
    public function index()
    {
        $karyas = KaryaSiswa::all();
        return view('pages.karya-siswa', compact('karyas'));
    }

        public function adminIndex()
    {
        $karyas = KaryaSiswa::latest()->get();
        return view('dashboard.karya-siswa.index', compact('karyas'));
    }

    public function create()
    {
        return view('dashboard.karya-siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'info_tambahan' => 'nullable|string',
            'gambar' => 'required|image|max:10240',        ]);

        $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images'), $namaFile);

        KaryaSiswa::create([
            'jurusan' => $request->jurusan,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'info_tambahan' => $request->info_tambahan,
            'gambar' => $namaFile,
        ]);

        return redirect('/dashboard/karya-siswa')->with('success', 'Karya berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karya = KaryaSiswa::findOrFail($id);
        return view('dashboard.karya-siswa.edit', compact('karya'));
    }

    public function update(Request $request, $id)
    {
        $karya = KaryaSiswa::findOrFail($id);

        $request->validate([
            'jurusan' => 'required|string',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'info_tambahan' => 'nullable|string',
            'gambar' => 'required|image|max:10240',        ]);

        $dataUpdate = [
            'jurusan' => $request->jurusan,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'info_tambahan' => $request->info_tambahan,
        ];

        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images'), $namaFile);
            $dataUpdate['gambar'] = $namaFile;
        }

        $karya->update($dataUpdate);

        return redirect('/dashboard/karya-siswa')->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KaryaSiswa::findOrFail($id)->delete();
        return redirect('/dashboard/karya-siswa')->with('success', 'Karya berhasil dihapus.');
    }
}