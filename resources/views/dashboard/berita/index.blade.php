@extends('layouts.dashboard')

@section('title', 'Kelola Berita')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="content-page-header">

    <div>
        <div class="dashboard-label">
            MANAJEMEN KONTEN
        </div>

        <h2>Kelola Berita & Artikel</h2>

        <p>
            Kelola publikasi berita, informasi, dan artikel seputar SMK Negeri 4 Kota Bogor.
        </p>
    </div>

    <a href="{{ route('admin.berita.create') }}" class="content-primary-btn">
        <i class="bi bi-plus-lg"></i>
        Tambah Berita
    </a>

</div>


{{-- ================= SUCCESS ================= --}}
@if (session('success'))

    <div class="content-alert">
        <i class="bi bi-check-circle-fill"></i>

        <span>
            {{ session('success') }}
        </span>
    </div>

@endif


{{-- ================= STATISTIK ================= --}}
<div class="row g-3 berita-stat-row">

    <div class="col-md-4">

        <div class="mini-stat-card">

            <div class="mini-stat-icon blue">
                <i class="bi bi-newspaper"></i>
            </div>

            <div>
                <span>Total Berita</span>
                <strong>{{ $beritas->count() }}</strong>
            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="mini-stat-card">

            <div class="mini-stat-icon green">
                <i class="bi bi-star"></i>
            </div>

            <div>
                <span>Berita Featured</span>
                <strong>
                    {{ $beritas->where('is_featured', true)->count() }}
                </strong>
            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="mini-stat-card">

            <div class="mini-stat-icon orange">
                <i class="bi bi-tags"></i>
            </div>

            <div>
                <span>Kategori</span>
                <strong>
                    {{ $beritas->pluck('kategori')->unique()->count() }}
                </strong>
            </div>

        </div>

    </div>

</div>


{{-- ================= TABLE PANEL ================= --}}
<div class="content-table-panel">

    {{-- HEADER TABLE --}}
    <div class="content-table-header">

        <div>
            <h5>Daftar Berita</h5>

            <p>
                Berita dan artikel yang tersimpan pada website.
            </p>
        </div>

        <div class="content-total">
            {{ $beritas->count() }} berita
        </div>

    </div>


    {{-- SEARCH / FILTER VISUAL --}}
    <div class="content-filter-bar">

        <div class="content-search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                id="beritaSearch"
                placeholder="Cari berita berdasarkan judul..."
            >

        </div>

        <select id="beritaCategory" class="content-select">

            <option value="">Semua Kategori</option>

            @foreach ($beritas->pluck('kategori')->unique() as $kategori)

                <option value="{{ strtolower($kategori) }}">
                    {{ $kategori }}
                </option>

            @endforeach

        </select>

    </div>


    {{-- TABLE --}}
    <div class="table-responsive">

        <table class="modern-content-table">

            <thead>

                <tr>
                    <th style="width: 90px;">Foto</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Featured</th>
                    <th style="width: 130px;">Aksi</th>
                </tr>

            </thead>

            <tbody id="beritaTable">

                @forelse ($beritas as $berita)

                    <tr
                        data-title="{{ strtolower($berita->judul) }}"
                        data-category="{{ strtolower($berita->kategori) }}"
                    >

                        {{-- FOTO --}}
                        <td>

                            <div class="berita-thumbnail">

                                <img
                                    src="{{ asset('images/' . $berita->gambar[0]) }}"
                                    alt="{{ $berita->judul }}"
                                >

                            </div>

                        </td>


                        {{-- JUDUL --}}
                        <td>

                            <div class="table-title">

                                <strong>
                                    {{ $berita->judul }}
                                </strong>

                                <span>
                                    Artikel website SMKN 4 Bogor
                                </span>

                            </div>

                        </td>


                        {{-- KATEGORI --}}
                        <td>

                            <span class="category-badge">
                                {{ $berita->kategori }}
                            </span>

                        </td>


                        {{-- TANGGAL --}}
                        <td>

                            <div class="date-info">

                                <i class="bi bi-calendar3"></i>

                                {{ $berita->tanggal->format('d M Y') }}

                            </div>

                        </td>


                        {{-- FEATURED --}}
                        <td>

                            @if ($berita->is_featured)

                                <span class="status-badge status-featured">
                                    <i class="bi bi-star-fill"></i>
                                    Featured
                                </span>

                            @else

                                <span class="status-badge status-normal">
                                    Biasa
                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('admin.berita.edit', $berita->id) }}"
                                    class="table-action edit"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('admin.berita.destroy', $berita->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin mau hapus berita ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="table-action delete"
                                        title="Hapus"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-content">

                                <i class="bi bi-newspaper"></i>

                                <strong>
                                    Belum ada berita
                                </strong>

                                <span>
                                    Tambahkan berita pertama untuk website sekolah.
                                </span>

                                <a href="{{ route('admin.berita.create') }}">
                                    + Tambah Berita
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- FOOTER TABLE --}}
    <div class="content-table-footer">

        <span>
            Menampilkan {{ $beritas->count() }} berita
        </span>

        <a href="/dashboard">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Dashboard
        </a>

    </div>

</div>


{{-- ================= SEARCH SCRIPT ================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('beritaSearch');
    const categorySelect = document.getElementById('beritaCategory');
    const rows = document.querySelectorAll('#beritaTable tr[data-title]');

    function filterBerita() {

        const keyword = searchInput.value.toLowerCase();
        const category = categorySelect.value.toLowerCase();

        rows.forEach(row => {

            const title = row.dataset.title;
            const rowCategory = row.dataset.category;

            const matchTitle = title.includes(keyword);
            const matchCategory =
                category === '' || rowCategory === category;

            row.style.display =
                matchTitle && matchCategory
                    ? ''
                    : 'none';

        });

    }

    searchInput.addEventListener('input', filterBerita);
    categorySelect.addEventListener('change', filterBerita);

});

</script>

@endsection