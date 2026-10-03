@extends('layouts.dashboard')

@section('title', 'Edit Karya Siswa')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN KARYA</div>
            <h1>Edit Karya Siswa</h1>
            <p>Perbarui informasi karya siswa yang sudah tersimpan.</p>
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
        action="{{ route('admin.karya.update', $karya->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="row g-4">

            {{-- KOLOM UTAMA --}}
            <div class="col-lg-8">

                <div class="content-form-card">

                    <div class="form-card-header">

                        <div class="form-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>

                        <div>
                            <h5>Informasi Karya</h5>
                            <p>Perbarui informasi karya siswa.</p>
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
                            value="{{ old('nama', $karya->nama) }}"
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

                            @foreach (['PPLG','TJKT','Pengelasan','Otomotif'] as $j)

                                <option
                                    value="{{ $j }}"
                                    {{ old('jurusan', $karya->jurusan) == $j ? 'selected' : '' }}
                                >
                                    {{ $j }}
                                </option>

                            @endforeach

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
                            rows="7"
                            placeholder="Jelaskan karya ini, fungsi, tujuan, atau keunggulannya..."
                            required
                        >{{ old('deskripsi', $karya->deskripsi) }}</textarea>

                        <small class="form-help">
                            Perbarui deskripsi jika terdapat informasi yang ingin diubah.
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
                            value="{{ old('info_tambahan', $karya->info_tambahan) }}"
                            placeholder="Contoh: Berbasis Web"
                        >

                        <small class="form-help">
                            Misalnya teknologi, bahan, atau jenis karya.
                        </small>

                    </div>

                </div>

            </div>


            {{-- KOLOM FOTO --}}
            <div class="col-lg-4">

                <div class="content-form-card">

                    <div class="form-card-header">

                        <div class="form-icon">
                            <i class="bi bi-image"></i>
                        </div>

                        <div>
                            <h5>Foto Karya</h5>
                            <p>Kelola foto karya siswa.</p>
                        </div>

                    </div>


                    {{-- FOTO LAMA --}}
                    <div class="current-image-section">

                        <div class="current-image-label">
                            Foto Saat Ini
                        </div>

                        <img
                            src="{{ asset('images/' . $karya->gambar) }}"
                            alt="{{ $karya->nama }}"
                            class="current-karya-image"
                        >

                    </div>


                    {{-- FOTO BARU --}}
                    <div class="form-group-custom mt-4">

                        <label>
                            Ganti Foto
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control"
                            accept="image/*"
                            onchange="previewKaryaEdit(event)"
                        >

                        <small class="form-help">
                            Kosongkan jika ingin tetap menggunakan foto saat ini.
                        </small>

                    </div>


                    {{-- PREVIEW FOTO BARU --}}
                    <div
                        id="newKaryaPreviewContainer"
                        class="mt-3 d-none"
                    >

                        <div class="current-image-label">
                            Preview Foto Baru
                        </div>

                        <img
                            id="newKaryaPreview"
                            src=""
                            alt="Preview Foto Baru"
                            class="current-karya-image"
                        >

                    </div>

                </div>


                {{-- INFO --}}
                <div class="content-form-card mt-4">

                    <div class="small-info-box">

                        <i class="bi bi-info-circle"></i>

                        <div>

                            <strong>Perubahan Foto</strong>

                            <p>
                                Foto lama tidak akan berubah jika kamu
                                tidak memilih foto baru.
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
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>


<script>
function previewKaryaEdit(event) {

    const input = event.target;
    const preview = document.getElementById('newKaryaPreview');
    const container = document.getElementById('newKaryaPreviewContainer');

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