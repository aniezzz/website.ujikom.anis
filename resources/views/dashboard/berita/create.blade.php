@extends('layouts.dashboard')

@section('title', 'Tambah Berita')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN KONTEN</div>
            <h1>Tambah Berita</h1>
            <p>Tambahkan berita atau artikel terbaru untuk website SMKN 4 Bogor.</p>
        </div>

        <a href="{{ route('admin.berita.index') }}" class="btn-back-content">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger custom-alert">
            <div class="fw-semibold mb-1">
                <i class="bi bi-exclamation-circle me-1"></i>
                Ada data yang perlu diperbaiki
            </div>

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            {{-- KOLOM UTAMA --}}
            <div class="col-lg-8">

                <div class="content-form-card">

                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>

                        <div>
                            <h5>Informasi Berita</h5>
                            <p>Isi informasi utama berita yang akan ditampilkan.</p>
                        </div>
                    </div>

                    {{-- JUDUL --}}
                    <div class="form-group-custom">
                        <label>
                            Judul Berita
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control form-control-custom"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: SMKN 4 Bogor Raih Prestasi di BIA Bogor Innovation Awards"
                            required
                        >
                    </div>

                    {{-- KATEGORI + TANGGAL --}}
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label>
                                    Kategori
                                    <span>*</span>
                                </label>

                                <select
                                    name="kategori"
                                    class="form-select form-control-custom"
                                    required
                                >
                                    <option value="Kegiatan"
                                        {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>
                                        Kegiatan
                                    </option>

                                    <option value="Prestasi"
                                        {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>
                                        Prestasi
                                    </option>

                                    <option value="Kurikulum"
                                        {{ old('kategori') == 'Kurikulum' ? 'selected' : '' }}>
                                        Kurikulum
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label>
                                    Tanggal
                                    <span>*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control form-control-custom"
                                    value="{{ old('tanggal') }}"
                                    required
                                >
                            </div>
                        </div>

                    </div>

                    {{-- PENULIS --}}
                    <div class="form-group-custom">
                        <label>
                            Penulis
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="penulis"
                            class="form-control form-control-custom"
                            value="{{ old('penulis') }}"
                            placeholder="Contoh: Tim Humas SMKN 4 Bogor"
                            required
                        >
                    </div>

                    {{-- RINGKASAN --}}
                    <div class="form-group-custom">
                        <label>
                            Ringkasan
                            <span>*</span>
                        </label>

                        <textarea
                            name="ringkasan"
                            class="form-control form-control-custom"
                            rows="4"
                            placeholder="Tuliskan ringkasan singkat berita untuk ditampilkan pada card..."
                            required
                        >{{ old('ringkasan') }}</textarea>

                        <small class="form-help">
                            Ringkasan ini akan digunakan sebagai deskripsi singkat pada halaman daftar berita.
                        </small>
                    </div>

                    {{-- ISI LENGKAP --}}
                    <div class="form-group-custom">
                        <label>
                            Isi Lengkap
                            <span>*</span>
                        </label>

                        <textarea
                            name="isi"
                            id="isiBerita"
                            class="form-control form-control-custom"
                            rows="16"
                            placeholder="Tulis isi berita di sini..."
                            required
                        >{{ old('isi') }}</textarea>

                        {{-- PETUNJUK FORMAT --}}
                        <div class="format-guide">

                            <div class="format-guide-title">
                                <i class="bi bi-info-circle"></i>
                                Panduan Format Isi Berita
                            </div>

                            <p>
                                Kamu bisa menggunakan format sederhana berikut agar
                                isi berita tampil lebih rapi pada halaman detail.
                            </p>

                            <div class="format-example">
                                <div class="format-label">
                                    <span>Subjudul</span>
                                </div>

                                <code>## Judul Subbagian</code>
                            </div>

                            <div class="format-example">
                                <div class="format-label">
                                    <span>Kutipan</span>
                                </div>

                                <code>&gt; Isi kutipan|Nama Orang</code>
                            </div>

                            <div class="format-example">
                                <div class="format-label">
                                    <span>Paragraf</span>
                                </div>

                                <code>
                                    Tulis paragraf pertama di sini.
                                    <br><br>
                                    Tulis paragraf berikutnya di sini.
                                </code>
                            </div>

                            <div class="format-note">
                                <i class="bi bi-lightbulb"></i>
                                <span>
                                    Pisahkan setiap paragraf, subjudul, dan kutipan
                                    dengan <strong>satu baris kosong</strong>.
                                </span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>


            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- FOTO --}}
                <div class="content-form-card mb-4">

                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-image"></i>
                        </div>

                        <div>
                            <h5>Foto Berita</h5>
                            <p>Upload foto utama berita.</p>
                        </div>
                    </div>

                    <div class="upload-box">

                        <i class="bi bi-cloud-arrow-up upload-icon"></i>

                        <div class="upload-title">
                            Pilih Foto
                        </div>

                        <div class="upload-text">
                            JPG, JPEG, PNG
                            <br>
                            Maksimal 10 MB
                        </div>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control mt-3"
                            accept="image/*"
                            required
                            onchange="previewImage(event)"
                        >

                    </div>

                    <div id="imagePreviewContainer" class="mt-3 d-none">
                        <img
                            id="imagePreview"
                            src=""
                            alt="Preview"
                            class="image-preview"
                        >
                    </div>

                </div>


                {{-- FEATURED --}}
                <div class="content-form-card">

                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-star"></i>
                        </div>

                        <div>
                            <h5>Pengaturan Berita</h5>
                            <p>Atur tampilan berita.</p>
                        </div>
                    </div>

                    <div class="featured-option">

                        <div>
                            <div class="featured-title">
                                Berita Featured
                            </div>

                            <div class="featured-description">
                                Berita akan ditampilkan sebagai berita utama
                                di halaman berita.
                            </div>
                        </div>

                        <div class="form-check form-switch">
                            <input
                                class="form-check-input featured-switch"
                                type="checkbox"
                                name="is_featured"
                                id="isFeatured"
                                {{ old('is_featured') ? 'checked' : '' }}
                            >
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="form-action-bottom">

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
                Simpan Berita
            </button>

        </div>

    </form>

</div>


{{-- PREVIEW FOTO --}}
<script>
function previewImage(event) {

    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imagePreviewContainer');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            container.classList.remove('d-none');
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection