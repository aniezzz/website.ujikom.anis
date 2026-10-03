@extends('layouts.dashboard')

@section('title', 'Pesan Masuk')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">
        <div>
            <div class="content-eyebrow">KOTAK MASUK</div>
            <h1>Pesan Masuk</h1>
            <p>Kelola pesan dan pertanyaan yang dikirim melalui website.</p>
        </div>
    </div>


    {{-- SUCCESS --}}
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
                    <i class="bi bi-envelope"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Total Pesan</div>

                    <div class="mini-stat-number">
                        {{ $pesans->count() }}
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="mini-stat-card">

                <div class="mini-stat-icon orange">
                    <i class="bi bi-envelope-open"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Belum Dibaca</div>

                    <div class="mini-stat-number">
                        {{ $pesans->where('is_read', false)->count() }}
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="mini-stat-card">

                <div class="mini-stat-icon green">
                    <i class="bi bi-check2-circle"></i>
                </div>

                <div>
                    <div class="mini-stat-label">Sudah Dibaca</div>

                    <div class="mini-stat-number">
                        {{ $pesans->where('is_read', true)->count() }}
                    </div>
                </div>

            </div>
        </div>

    </div>


    {{-- TABLE PANEL --}}
    <div class="content-table-panel">

        <div class="content-table-top">

            <div>
                <h5>Daftar Pesan</h5>
                <p>Pesan yang masuk melalui halaman kontak website.</p>
            </div>

            <div class="content-search">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchPesan"
                    placeholder="Cari pesan..."
                >
            </div>

        </div>


        <div class="table-responsive">

            <table class="table modern-content-table">

                <thead>
                    <tr>
                        <th width="100">Status</th>
                        <th>Pengirim</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th width="150">Tanggal</th>
                        <th width="145">Aksi</th>
                    </tr>
                </thead>

                <tbody id="pesanTableBody">

                    @forelse ($pesans as $item)

                        <tr class="pesan-row {{ !$item->is_read ? 'unread-row' : '' }}">

                            {{-- STATUS --}}
                            <td>

                                @if ($item->is_read)

                                    <span class="message-status read">
                                        <i class="bi bi-envelope-open"></i>
                                        Dibaca
                                    </span>

                                @else

                                    <span class="message-status unread">
                                        <span class="status-dot"></span>
                                        Baru
                                    </span>

                                @endif

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="sender-name">
                                    {{ $item->nama }}
                                </div>

                            </td>


                            {{-- EMAIL --}}
                            <td>

                                <div class="sender-email">
                                    {{ $item->email }}
                                </div>

                            </td>


                            {{-- SUBJEK --}}
                            <td>

                                <div class="message-subject">
                                    {{ $item->subjek }}
                                </div>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <div class="message-date">
                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->created_at->format('d/m/Y') }}

                                    <small>
                                        {{ $item->created_at->format('H:i') }}
                                    </small>
                                </div>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="content-actions">

                                    <a
                                        href="{{ route('admin.pesan.show', $item->id) }}"
                                        class="action-btn view"
                                        title="Lihat Pesan"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>


                                    <form
                                        action="{{ route('admin.pesan.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete"
                                            title="Hapus Pesan"
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

                                    <div class="empty-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>

                                    <h5>Belum Ada Pesan</h5>

                                    <p>
                                        Belum ada pesan yang masuk melalui website.
                                    </p>

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
            Total {{ $pesans->count() }} pesan
        </span>

    </div>

</div>


{{-- SEARCH --}}
<script>

document.getElementById('searchPesan').addEventListener('keyup', function () {

    const keyword = this.value.toLowerCase();

    const rows = document.querySelectorAll('.pesan-row');

    rows.forEach(function (row) {

        const text = row.innerText.toLowerCase();

        row.style.display = text.includes(keyword) ? '' : 'none';

    });

});

</script>

@endsection