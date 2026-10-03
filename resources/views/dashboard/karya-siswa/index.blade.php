@extends('layouts.dashboard')

@section('title', 'Kelola Karya Siswa')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN KARYA</div>
            <h1>Kelola Karya Siswa</h1>
            <p>Kelola karya dan produk siswa yang ditampilkan di website.</p>
        </div>

        <a href="{{ route('admin.karya.create') }}" class="btn-add-content">
            <i class="bi bi-plus-lg"></i>
            Tambah Karya
        </a>
    </div>


    {{-- SUCCESS ALERT --}}
    @if (session('success'))
        <div class="alert alert-success custom-alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="mini-stat-card">
                <div class="mini-stat-icon blue">
                    <i class="bi bi-tools"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Total Karya</div>
                    <div class="mini-stat-number">{{ $karyas->count() }}</div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="mini-stat-card">
                <div class="mini-stat-icon green">
                    <i class="bi bi-mortarboard"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Jurusan</div>
                    <div class="mini-stat-number">
                        {{ $karyas->pluck('jurusan')->unique()->count() }}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="mini-stat-card">
                <div class="mini-stat-icon orange">
                    <i class="bi bi-image"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Foto Karya</div>
                    <div class="mini-stat-number">{{ $karyas->count() }}</div>
                </div>
            </div>
        </div>

    </div>


    {{-- TABLE PANEL --}}
    <div class="content-table-panel">

        <div class="content-table-top">

            <div>
                <h5>Daftar Karya Siswa</h5>
                <p>Daftar karya yang saat ini tersedia di website.</p>
            </div>

            <div class="content-search">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchKarya"
                    placeholder="Cari karya..."
                >
            </div>

        </div>


        <div class="table-responsive">

            <table class="table modern-content-table">

                <thead>
                    <tr>
                        <th width="90">Foto</th>
                        <th>Nama Karya</th>
                        <th>Jurusan</th>
                        <th>Info Tambahan</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody id="karyaTableBody">

                    @forelse ($karyas as $item)

                        <tr class="karya-row">

                            {{-- FOTO --}}
                            <td>

                                <img
                                    src="{{ asset('images/' . $item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    class="content-table-image"
                                >

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="content-title">
                                    {{ $item->nama }}
                                </div>

                                <div class="content-description">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 65) }}
                                </div>

                            </td>


                            {{-- JURUSAN --}}
                            <td>

                                <span class="content-badge">
                                    {{ $item->jurusan }}
                                </span>

                            </td>


                            {{-- INFO TAMBAHAN --}}
                            <td>

                                @if ($item->info_tambahan)

                                    <span class="info-text">
                                        {{ $item->info_tambahan }}
                                    </span>

                                @else

                                    <span class="text-muted">
                                        —
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="content-actions">

                                    <a
                                        href="{{ route('admin.karya.edit', $item->id) }}"
                                        class="action-btn edit"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.karya.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus karya ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete"
                                            title="Hapus"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr id="emptyKarya">

                            <td colspan="5">

                                <div class="empty-content">

                                    <div class="empty-icon">
                                        <i class="bi bi-tools"></i>
                                    </div>

                                    <h5>Belum Ada Karya</h5>

                                    <p>
                                        Belum ada karya siswa yang ditambahkan.
                                    </p>

                                    <a
                                        href="{{ route('admin.karya.create') }}"
                                        class="btn-add-content"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        Tambah Karya
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- FOOTER --}}
    <div class="content-page-footer">

        <a href="/dashboard">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Dashboard
        </a>

        <span>
            Total {{ $karyas->count() }} karya
        </span>

    </div>

</div>


{{-- SEARCH --}}
<script>

document.getElementById('searchKarya').addEventListener('keyup', function () {

    const keyword = this.value.toLowerCase();

    const rows = document.querySelectorAll('.karya-row');

    rows.forEach(function (row) {

        const text = row.innerText.toLowerCase();

        row.style.display = text.includes(keyword) ? '' : 'none';

    });

});

</script>

@endsection