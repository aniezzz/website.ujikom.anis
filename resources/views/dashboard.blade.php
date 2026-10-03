@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

{{-- ================= HEADER DASHBOARD ================= --}}
<div class="dashboard-welcome">

    <div>

        <div class="dashboard-label">
            PANEL KENDALI
        </div>

        <h2>
            Selamat datang, {{ Auth::user()->name }}!
        </h2>

        <p>
            Kelola informasi dan konten website SMK Negeri 4 Kota Bogor
            melalui panel admin.
        </p>

    </div>

</div>


{{-- ================= STATISTIK UTAMA ================= --}}
<div class="row g-4 dashboard-statistics">

    {{-- TOTAL BERITA --}}
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-blue">

            <div class="stat-card-top">

                <div>

                    <div class="stat-title">
                        Total Berita
                    </div>

                    <div class="stat-number">
                        {{ $totalBerita }}
                    </div>

                    <div class="stat-description">
                        Artikel tersimpan
                    </div>

                </div>

                <div class="stat-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

            </div>

            <a href="{{ route('admin.berita.index') }}"
               class="stat-link">

                Kelola Berita

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    {{-- TOTAL LIKE GALERI --}}
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-orange">

            <div class="stat-card-top">

                <div>

                    <div class="stat-title">
                        Total Like Galeri
                    </div>

                    <div class="stat-number">
                        {{ $totalLikes }}
                    </div>

                    <div class="stat-description">
                        Like dari seluruh foto
                    </div>

                </div>

                <div class="stat-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>

            </div>

            <a href="{{ route('admin.galeri.index') }}"
               class="stat-link">

                Lihat Galeri

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    {{-- TOTAL FOTO GALERI --}}
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-purple">

            <div class="stat-card-top">

                <div>

                    <div class="stat-title">
                        Foto Galeri
                    </div>

                    <div class="stat-number">
                        {{ $totalGaleri }}
                    </div>

                    <div class="stat-description">
                        Media tersimpan
                    </div>

                </div>

                <div class="stat-icon">
                    <i class="bi bi-images"></i>
                </div>

            </div>

            <a href="{{ route('admin.galeri.index') }}"
               class="stat-link">

                Kelola Galeri

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    {{-- PESAN MASUK --}}
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-red">

            <div class="stat-card-top">

                <div>

                    <div class="stat-title">
                        Pesan Masuk
                    </div>

                    <div class="stat-number">
                        {{ \App\Models\Pesan::where('is_read', false)->count() }}
                    </div>

                    <div class="stat-description">
                        Belum dibaca
                    </div>

                </div>

                <div class="stat-icon">
                    <i class="bi bi-envelope"></i>
                </div>

            </div>

            <a href="{{ route('admin.pesan.index') }}"
               class="stat-link">

                Lihat Pesan

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</div>


{{-- ================= STATISTIK WEBSITE + AKSES CEPAT ================= --}}
<div class="row g-4">


    {{-- ================= STATISTIK WEBSITE ================= --}}
    <div class="col-lg-8">

        <div class="dashboard-panel">

            {{-- HEADER --}}
            <div class="dashboard-panel-header">

                <div>

                    <h5>
                        Statistik Website
                    </h5>

                    <p>
                        Data konten dan interaksi yang tercatat di website.
                    </p>

                </div>

                <i class="bi bi-bar-chart-line"></i>

            </div>


            {{-- CHART --}}
            <div class="statistik-chart-wrapper">

                <canvas id="websiteStatisticsChart"></canvas>

            </div>


            {{-- RINGKASAN STATISTIK --}}
            <div class="statistik-summary">


                {{-- BERITA --}}
                <div class="statistik-item">

                    <i class="bi bi-newspaper"></i>

                    <div>

                        <strong>
                            {{ $totalBerita }}
                        </strong>

                        <span>
                            Berita
                        </span>

                    </div>

                </div>


                {{-- KARYA SISWA --}}
                <div class="statistik-item">

                    <i class="bi bi-scissors"></i>

                    <div>

                        <strong>
                            {{ $totalKarya }}
                        </strong>

                        <span>
                            Karya Siswa
                        </span>

                    </div>

                </div>


                {{-- GALERI --}}
                <div class="statistik-item">

                    <i class="bi bi-images"></i>

                    <div>

                        <strong>
                            {{ $totalGaleri }}
                        </strong>

                        <span>
                            Foto Galeri
                        </span>

                    </div>

                </div>


                {{-- PEMBACA --}}
                <div class="statistik-item">

                    <i class="bi bi-eye"></i>

                    <div>

                        <strong>
                            {{ $totalPembaca }}
                        </strong>

                        <span>
                            Pembaca Berita
                        </span>

                    </div>

                </div>


                {{-- LIKE --}}
                <div class="statistik-item">

                    <i class="bi bi-heart-fill"></i>

                    <div>

                        <strong>
                            {{ $totalLikes }}
                        </strong>

                        <span>
                            Like Galeri
                        </span>

                    </div>

                </div>


            </div>

        </div>

    </div>


    {{-- ================= AKSES CEPAT ================= --}}
    <div class="col-lg-4">

        <div class="dashboard-panel quick-panel">


            {{-- HEADER --}}
            <div class="dashboard-panel-header">

                <div>

                    <h5>
                        Akses Cepat
                    </h5>

                    <p>
                        Kelola konten website
                    </p>

                </div>

                <i class="bi bi-lightning-charge"></i>

            </div>


            {{-- QUICK ACTION --}}
            <div class="quick-actions">


                {{-- TAMBAH BERITA --}}
                <a href="{{ route('admin.berita.create') }}"
                   class="quick-action">

                    <div class="quick-action-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>

                        <strong>
                            Tambah Berita
                        </strong>

                        <span>
                            Buat artikel baru
                        </span>

                    </div>

                    <i class="bi bi-chevron-right"></i>

                </a>


                {{-- TAMBAH KARYA --}}
                <a href="{{ route('admin.karya.create') }}"
                   class="quick-action">

                    <div class="quick-action-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>

                        <strong>
                            Tambah Karya
                        </strong>

                        <span>
                            Tambahkan karya siswa
                        </span>

                    </div>

                    <i class="bi bi-chevron-right"></i>

                </a>


                {{-- TAMBAH GALERI --}}
                <a href="{{ route('admin.galeri.create') }}"
                   class="quick-action">

                    <div class="quick-action-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>

                        <strong>
                            Tambah Galeri
                        </strong>

                        <span>
                            Upload dokumentasi
                        </span>

                    </div>

                    <i class="bi bi-chevron-right"></i>

                </a>


            </div>

        </div>

    </div>

</div>


{{-- ================= CHART JS ================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const ctx = document.getElementById('websiteStatisticsChart');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: [
                'Berita',
                'Karya Siswa',
                'Galeri',
                'Pembaca',
                'Like'
            ],

            datasets: [

                {

                    data: [

                        {{ $totalBerita }},
                        {{ $totalKarya }},
                        {{ $totalGaleri }},
                        {{ $totalPembaca }},
                        {{ $totalLikes }}

                    ],

                    borderWidth: 3,

                    tension: 0.45,

                    fill: true,

                    pointRadius: 5,

                    pointHoverRadius: 7

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        precision: 0

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            }

        }

    });

</script>


{{-- ================= INFORMASI SISTEM ================= --}}
<div class="dashboard-info-panel">

    <div class="info-panel-icon">

        <i class="bi bi-info-circle"></i>

    </div>


    <div>

        <strong>
            Dashboard Admin SMKN 4 Bogor
        </strong>

        <p>
            Gunakan panel ini untuk mengelola berita, karya siswa,
            galeri, dan pesan yang masuk dari pengunjung website.
        </p>

    </div>

</div>

@endsection