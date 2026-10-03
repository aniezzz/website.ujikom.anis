<?php

namespace App\Http\Controllers;

use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->get();
        return view('dashboard.pesan.index', compact('pesans'));
    }

    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->update(['is_read' => true]);
        return view('dashboard.pesan.show', compact('pesan'));
    }

    public function destroy($id)
    {
        Pesan::findOrFail($id)->delete();
        return redirect('/dashboard/pesan')->with('success', 'Pesan berhasil dihapus.');
    }
}