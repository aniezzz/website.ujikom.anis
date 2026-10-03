@extends('layouts.dashboard')

@section('title', 'Tambah Foto Galeri')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN GALERI</div>
            <h1>Tambah Foto Galeri</h1>
            <p>Tambahkan dokumentasi kegiatan baru ke galeri website.</p>
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
                <i class="bi bi-images"></i>
            </div>

            <div>
                <h3>Informasi Foto</h3>
                <p>Isi informasi foto yang ingin ditambahkan.</p>
            </div>
        </div>


        <form
            action="{{ route('admin.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


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
                        {{ old('kategori') == 'Kegiatan Siswa' ? 'selected' : '' }}
                    >
                        Kegiatan Siswa
                    </option>

                    <option
                        value="Prestasi"
                        {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}
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
                    value="{{ old('judul') }}"
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
                    value="{{ old('tanggal') }}"
                    required
                >

            </div>


            {{-- FOTO --}}
            <div class="modern-form-group">

                <label for="gambar">
                    Foto
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    class="modern-form-control"
                    accept="image/*"
                    required
                >

                <div class="form-help-text">
                    <i class="bi bi-info-circle"></i>
                    Pilih foto dengan format JPG, JPEG, atau PNG.
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
                    Simpan Foto
                </button>

            </div>

        </form>

    </div>

</div>

@endsection