@extends('layouts.dashboard')

@section('title', 'Kelola Galeri')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">MANAJEMEN KONTEN</div>
            <h1>Kelola Galeri</h1>
            <p>Kelola foto kegiatan dan dokumentasi SMKN 4 Bogor.</p>
        </div>

        <a href="{{ route('admin.galeri.create') }}" class="btn-add-content">
            <i class="bi bi-plus-lg"></i>
            Tambah Foto
        </a>
    </div>


    {{-- ALERT --}}
    @if (session('success'))
        <div class="content-alert success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif


    {{-- STAT --}}
    <div class="content-stats-row">

        <div class="mini-stat-card">
            <div class="mini-stat-icon blue">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <span>Total Foto</span>
                <strong>{{ $galeris->count() }}</strong>
            </div>
        </div>

    </div>


    {{-- TABLE --}}
    <div class="content-table-panel">

        <div class="content-table-header">
            <div>
                <h3>Daftar Galeri</h3>
                <p>Semua foto yang tersedia di website.</p>
            </div>

            <div class="content-search">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    id="galeriSearch"
                    placeholder="Cari foto..."
                >
            </div>
        </div>


        <div class="table-responsive">

            <table class="modern-content-table">

                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>

                <tbody id="galeriTableBody">

                    @forelse ($galeris as $item)

                        <tr class="galeri-row">

                            {{-- FOTO --}}
                            <td>

                                <div class="galeri-admin-photo">

                                    <img
                                        src="{{ asset('images/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                    >

                                </div>

                            </td>


                            {{-- JUDUL --}}
                            <td>

                                <div class="admin-content-title">
                                    {{ $item->judul }}
                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                <span class="content-category-badge">
                                    {{ $item->kategori }}
                                </span>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <div class="content-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->tanggal?->format('d/m/Y') ?? '-' }}

                                </div>

                            </td>


                            {{-- AKSI --}}
                            <td class="text-end">

                                <div class="content-actions">

                                    <a
                                        href="{{ route('admin.galeri.edit', $item->id) }}"
                                        class="action-btn edit"
                                        title="Edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.galeri.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
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

                        <tr>

                            <td colspan="5">

                                <div class="content-empty-state">

                                    <div class="content-empty-icon">
                                        <i class="bi bi-images"></i>
                                    </div>

                                    <h4>Belum ada foto</h4>

                                    <p>
                                        Belum ada dokumentasi yang ditambahkan ke galeri.
                                    </p>

                                    <a
                                        href="{{ route('admin.galeri.create') }}"
                                        class="btn-add-content"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        Tambah Foto
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- SEARCH --}}
<script>

    const galeriSearch =
        document.getElementById('galeriSearch');

    const galeriRows =
        document.querySelectorAll('.galeri-row');


    if (galeriSearch) {

        galeriSearch.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();


            galeriRows.forEach(row => {

                const text =
                    row.textContent.toLowerCase();


                row.style.display =
                    text.includes(keyword)
                        ? ''
                        : 'none';

            });

        });

    }

</script>

@endsection