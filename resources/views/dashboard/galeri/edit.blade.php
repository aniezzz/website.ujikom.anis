@extends('layouts.dashboard')

@section('title', 'Edit Foto Galeri')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN GALERI</div>
            <h1>Edit Foto Galeri</h1>
            <p>Perbarui informasi dan dokumentasi foto galeri.</p>
        </div>

        <a
            href="{{ route('admin.galeri.index') }}"
            class="btn-back-content"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>


    {{-- ERROR --}}
    @if ($errors->any())
        <div class="content-alert danger">
            <i class="bi bi-exclamation-circle-fill"></i>

            <div>
                <strong>Terjadi kesalahan</strong>

                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    {{-- FORM --}}
    <div class="content-form-card">

        <div class="content-form-header">
            <div class="content-form-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h3>Informasi Foto</h3>
                <p>Ubah data foto yang ingin diperbarui.</p>
            </div>
        </div>


        <form
            action="{{ route('admin.galeri.update', $galeri->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- KATEGORI --}}
            <div class="modern-form-group">

                <label for="kategori">
                    Kategori
                </label>

                <select
                    id="kategori"
                    name="kategori"
                    class="modern-form-control"
                    required
                >
                    <option
                        value="Kegiatan Siswa"
                        {{ old('kategori', $galeri->kategori) == 'Kegiatan Siswa' ? 'selected' : '' }}
                    >
                        Kegiatan Siswa
                    </option>

                    <option
                        value="Prestasi"
                        {{ old('kategori', $galeri->kategori) == 'Prestasi' ? 'selected' : '' }}
                    >
                        Prestasi
                    </option>

                </select>

            </div>


            {{-- JUDUL --}}
            <div class="modern-form-group">

                <label for="judul">
                    Judul Foto
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    class="modern-form-control"
                    value="{{ old('judul', $galeri->judul) }}"
                    placeholder="Contoh: Kegiatan Upacara Bendera"
                    required
                >

            </div>


            {{-- TANGGAL --}}
            <div class="modern-form-group">

                <label for="tanggal">
                    Tanggal
                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    class="modern-form-control"
                    value="{{ old('tanggal', $galeri->tanggal?->format('Y-m-d')) }}"
                    required
                >

            </div>


            {{-- FOTO SAAT INI --}}
            <div class="modern-form-group">

                <label>
                    Foto Saat Ini
                </label>

                <div class="current-image-section">

                    <img
                        src="{{ asset('images/' . $galeri->gambar) }}"
                        alt="{{ $galeri->judul }}"
                        class="current-galeri-image"
                    >

                </div>

            </div>


            {{-- GANTI FOTO --}}
            <div class="modern-form-group">

                <label for="gambar">
                    Ganti Foto
                    <span class="optional-label">(opsional)</span>
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    class="modern-form-control"
                    accept="image/*"
                >

                <div class="form-help-text">
                    <i class="bi bi-info-circle"></i>
                    Kosongkan jika tidak ingin mengganti foto.
                </div>

            </div>


            {{-- BUTTON --}}
            <div class="content-form-footer">

                <a
                    href="{{ route('admin.galeri.index') }}"
                    class="btn-cancel-content"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-save-content"
                >
                    <i class="bi bi-check-lg"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection