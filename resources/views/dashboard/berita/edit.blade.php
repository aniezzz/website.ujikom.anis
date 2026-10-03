@extends('layouts.dashboard')

@section('title', 'Edit Berita')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN BERITA</div>
            <h1>Edit Berita</h1>
            <p>Perbarui informasi dan isi berita yang sudah dipublikasikan.</p>
        </div>

        <a
            href="{{ route('admin.berita.index') }}"
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
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif


    {{-- FORM --}}
    <div class="content-form-card berita-edit-card">

        <div class="content-form-header">

            <div class="content-form-icon">
                <i class="bi bi-newspaper"></i>
            </div>

            <div>
                <h3>Informasi Berita</h3>
                <p>Ubah informasi berita sesuai kebutuhan.</p>
            </div>

        </div>


        <form
            action="{{ route('admin.berita.update', $berita->id) }}"
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
                    name="kategori"
                    id="kategori"
                    class="modern-form-control"
                    required
                >

                    <option
                        value="Kegiatan"
                        {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}
                    >
                        Kegiatan
                    </option>

                    <option
                        value="Prestasi"
                        {{ old('kategori', $berita->kategori) == 'Prestasi' ? 'selected' : '' }}
                    >
                        Prestasi
                    </option>

                    <option
                        value="Kurikulum"
                        {{ old('kategori', $berita->kategori) == 'Kurikulum' ? 'selected' : '' }}
                    >
                        Kurikulum
                    </option>

                </select>

            </div>


            {{-- JUDUL --}}
            <div class="modern-form-group">

                <label for="judul">
                    Judul Berita
                </label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="modern-form-control"
                    value="{{ old('judul', $berita->judul) }}"
                    placeholder="Masukkan judul berita"
                    required
                >

            </div>


            {{-- PENULIS --}}
            <div class="modern-form-group">

                <label for="penulis">
                    Penulis
                </label>

                <input
                    type="text"
                    name="penulis"
                    id="penulis"
                    class="modern-form-control"
                    value="{{ old('penulis', $berita->penulis) }}"
                    placeholder="Nama penulis"
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
                    name="tanggal"
                    id="tanggal"
                    class="modern-form-control"
                    value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}"
                    required
                >

            </div>


            {{-- RINGKASAN --}}
            <div class="modern-form-group">

                <label for="ringkasan">
                    Ringkasan
                    <span class="form-label-hint">
                        (untuk card berita)
                    </span>
                </label>

                <textarea
                    name="ringkasan"
                    id="ringkasan"
                    class="modern-form-control modern-textarea"
                    rows="4"
                    placeholder="Tulis ringkasan singkat berita..."
                    required
                >{{ old('ringkasan', $berita->ringkasan) }}</textarea>

                <div class="form-help-text">
                    <i class="bi bi-info-circle"></i>
                    Ringkasan ini akan digunakan pada tampilan card berita.
                </div>

            </div>


            {{-- ISI --}}
            <div class="modern-form-group">

                <label for="isi">
                    Isi Lengkap
                </label>

                <textarea
                    name="isi"
                    id="isi"
                    class="modern-form-control modern-textarea berita-content-textarea"
                    rows="12"
                    placeholder="Tulis isi lengkap berita..."
                    required
                >{{ old('isi', $berita->isi) }}</textarea>

                <div class="form-help-text">
                    <i class="bi bi-info-circle"></i>
                    Gunakan paragraf yang rapi agar nyaman dibaca pada halaman berita.
                </div>

            </div>


            {{-- FOTO --}}
            <div class="modern-form-group">

                <label>
                    Foto Saat Ini
                </label>

                <div class="current-news-image-wrapper">

                    <img
                        src="{{ asset('images/' . $berita->gambar[0]) }}"
                        alt="{{ $berita->judul }}"
                        class="current-news-image"
                    >

                </div>

            </div>


            {{-- GANTI FOTO --}}
            <div class="modern-form-group">

                <label for="gambar">
                    Ganti Foto
                    <span class="optional-label">
                        (opsional)
                    </span>
                </label>

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    class="modern-form-control"
                    accept="image/*"
                >

                <div class="form-help-text">
                    <i class="bi bi-info-circle"></i>
                    Kosongkan jika tidak ingin mengganti foto.
                </div>

            </div>


            {{-- FEATURED --}}
            <div class="featured-option-box">

                <div class="featured-option-icon">
                    <i class="bi bi-star-fill"></i>
                </div>

                <div class="featured-option-content">

                    <label
                        for="isFeatured"
                        class="featured-option-title"
                    >
                        Jadikan Berita Featured
                    </label>

                    <p>
                        Berita akan ditampilkan lebih besar di bagian atas halaman berita.
                    </p>

                </div>

                <div class="featured-switch">

                    <input
                        type="checkbox"
                        name="is_featured"
                        id="isFeatured"
                        {{ $berita->is_featured ? 'checked' : '' }}
                    >

                    <label for="isFeatured"></label>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="content-form-footer">

                <a
                    href="{{ route('admin.berita.index') }}"
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