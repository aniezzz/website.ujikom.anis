@extends('layouts.dashboard')

@section('title', 'Tambah Karya Siswa')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN KARYA</div>
            <h1>Tambah Karya Siswa</h1>
            <p>Tambahkan karya atau produk siswa ke dalam website SMKN 4 Bogor.</p>
        </div>

        <a href="{{ route('admin.karya.index') }}" class="btn-back-content">
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


    <form
        action="{{ route('admin.karya.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="row g-4">

            {{-- KOLOM UTAMA --}}
            <div class="col-lg-8">

                <div class="content-form-card">

                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-tools"></i>
                        </div>

                        <div>
                            <h5>Informasi Karya</h5>
                            <p>Isi informasi mengenai karya siswa yang akan ditampilkan.</p>
                        </div>
                    </div>


                    {{-- NAMA KARYA --}}
                    <div class="form-group-custom">
                        <label>
                            Nama Karya
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control form-control-custom"
                            value="{{ old('nama') }}"
                            placeholder="Contoh: Aplikasi Kasir Berbasis Web"
                            required
                        >
                    </div>


                    {{-- JURUSAN --}}
                    <div class="form-group-custom">

                        <label>
                            Jurusan
                            <span>*</span>
                        </label>

                        <select
                            name="jurusan"
                            class="form-select form-control-custom"
                            required
                        >
                            <option value="">Pilih Jurusan</option>

                            <option value="PPLG"
                                {{ old('jurusan') == 'PPLG' ? 'selected' : '' }}>
                                PPLG
                            </option>

                            <option value="TJKT"
                                {{ old('jurusan') == 'TJKT' ? 'selected' : '' }}>
                                TJKT
                            </option>

                            <option value="Pengelasan"
                                {{ old('jurusan') == 'Pengelasan' ? 'selected' : '' }}>
                                Pengelasan
                            </option>

                            <option value="Otomotif"
                                {{ old('jurusan') == 'Otomotif' ? 'selected' : '' }}>
                                Otomotif
                            </option>
                        </select>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group-custom">

                        <label>
                            Deskripsi Karya
                            <span>*</span>
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control form-control-custom"
                            rows="6"
                            placeholder="Jelaskan karya ini, fungsi, tujuan, atau keunggulannya..."
                            required
                        >{{ old('deskripsi') }}</textarea>

                        <small class="form-help">
                            Tuliskan penjelasan singkat mengenai karya siswa.
                        </small>

                    </div>


                    {{-- INFO TAMBAHAN --}}
                    <div class="form-group-custom">

                        <label>
                            Info Tambahan
                        </label>

                        <input
                            type="text"
                            name="info_tambahan"
                            class="form-control form-control-custom"
                            value="{{ old('info_tambahan') }}"
                            placeholder="Contoh: Berbasis Web"
                        >

                        <small class="form-help">
                            Bisa digunakan untuk informasi tambahan seperti teknologi,
                            bahan, atau jenis karya.
                        </small>

                    </div>

                </div>

            </div>


            {{-- KOLOM SAMPING --}}
            <div class="col-lg-4">

                <div class="content-form-card">

                    <div class="form-card-header">

                        <div class="form-icon">
                            <i class="bi bi-image"></i>
                        </div>

                        <div>
                            <h5>Foto Karya</h5>
                            <p>Upload foto karya siswa.</p>
                        </div>

                    </div>


                    {{-- UPLOAD --}}
                    <div class="upload-box">

                        <i class="bi bi-cloud-arrow-up upload-icon"></i>

                        <div class="upload-title">
                            Pilih Foto Karya
                        </div>

                        <div class="upload-text">
                            JPG, JPEG, PNG
                            <br>
                            Gunakan foto dengan kualitas yang jelas.
                        </div>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control mt-3"
                            accept="image/*"
                            required
                            onchange="previewKarya(event)"
                        >

                    </div>


                    {{-- PREVIEW --}}
                    <div
                        id="karyaPreviewContainer"
                        class="mt-3 d-none"
                    >
                        <div class="preview-label">
                            Preview Foto
                        </div>

                        <img
                            id="karyaPreview"
                            src=""
                            alt="Preview Karya"
                            class="image-preview"
                        >
                    </div>

                </div>


                {{-- INFO --}}
                <div class="content-form-card mt-4">

                    <div class="small-info-box">

                        <i class="bi bi-lightbulb"></i>

                        <div>
                            <strong>Tips</strong>

                            <p>
                                Gunakan foto karya yang jelas dan memiliki
                                pencahayaan yang baik agar tampil menarik
                                di halaman Karya Siswa.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="form-action-bottom">

            <a
                href="{{ route('admin.karya.index') }}"
                class="btn-cancel-content"
            >
                Batal
            </a>

            <button
                type="submit"
                class="btn-save-content"
            >
                <i class="bi bi-check-lg"></i>
                Simpan Karya
            </button>

        </div>

    </form>

</div>


{{-- PREVIEW FOTO --}}
<script>
function previewKarya(event) {

    const input = event.target;
    const preview = document.getElementById('karyaPreview');
    const container = document.getElementById('karyaPreviewContainer');

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