@extends('layouts.app')

@section('title', 'Produk & Karya Siswa - SMK Negeri 4 Kota Bogor')

@section('content')

    {{-- =========================================================
       NOMOR WHATSAPP
       GANTI ANGKA DI BAWAH DENGAN NOMOR WHATSAPP TUJUAN
       Format: 62895414529555
    ========================================================== --}}
    @php
        $whatsapp = '62895414529555';

        $jumlahKarya = $karyas->count();

        $jumlahJurusan = $karyas
            ->pluck('jurusan')
            ->unique()
            ->count();
    @endphp


    {{-- =========================================================
       HERO / HEADER
    ========================================================== --}}
    <section class="ks-header text-center">

        <div class="container">

            <div class="ks-badge">
                KARYA & INOVASI SISWA
            </div>


            <h1
                class="fw-bold mb-3"
                style="font-size: 2rem;"
            >
                Karya Nyata &
                <span class="text-highlight">
                    Produk Unggulan Siswa
                </span>
            </h1>


            <p
                class="text-muted mx-auto mb-4"
                style="max-width: 680px;"
            >
                Kenali berbagai karya dan produk yang dihasilkan
                siswa SMKN 4 Bogor melalui pembelajaran berbasis
                praktik, kreativitas, dan kompetensi sesuai bidang
                keahlian masing-masing.
            </p>


            {{-- STATISTIK --}}
            <div class="row g-3 justify-content-center">

                {{-- JUMLAH KARYA --}}
                <div class="col-6 col-md-3">

                    <div class="ks-stat-box">

                        <div class="ks-stat-label">
                            KARYA SISWA
                        </div>

                        <div class="ks-stat-number">
                            {{ $jumlahKarya }}
                        </div>

                        <div class="ks-stat-desc">
                            Karya Terdaftar
                        </div>

                    </div>

                </div>


                {{-- PROGRAM KEAHLIAN --}}
                <div class="col-6 col-md-3">

                    <div class="ks-stat-box">

                        <div class="ks-stat-label">
                            PROGRAM KEAHLIAN
                        </div>

                        <div class="ks-stat-number">
                            {{ $jumlahJurusan }}
                        </div>

                        <div class="ks-stat-desc">
                            Bidang Keahlian
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
       KATALOG KARYA
    ========================================================== --}}
    <section
        class="py-5"
        style="border-bottom: 1px solid var(--color-border);"
    >

        <div class="container">

            <div class="tefa-label">
                EKSPLORASI KARYA SISWA
            </div>


            <div
                class="d-flex flex-column flex-md-row
                       align-items-md-end justify-content-between
                       gap-3 mb-4"
            >

                <div>

                    <h2
                        class="fw-bold mb-1"
                        style="font-size: 1.6rem;"
                    >
                        Katalog Karya & Produk
                    </h2>

                    <p
                        class="text-muted mb-0"
                        style="max-width: 600px;"
                    >
                        Lihat karya siswa berdasarkan program keahlian
                        dan temukan berbagai hasil pembelajaran
                        yang dikembangkan di sekolah.
                    </p>

                </div>

            </div>


            {{-- FILTER --}}
            <div
                class="d-flex gap-2 flex-wrap"
                id="ksFilterWrap"
            >

                <button
                    type="button"
                    class="ks-filter-btn active"
                    data-filter="Semua"
                >
                    Semua Karya
                </button>


                <button
                    type="button"
                    class="ks-filter-btn"
                    data-filter="PPLG"
                >
                    PPLG
                </button>


                <button
                    type="button"
                    class="ks-filter-btn"
                    data-filter="TJKT"
                >
                    TJKT
                </button>


                <button
                    type="button"
                    class="ks-filter-btn"
                    data-filter="Pengelasan"
                >
                    Pengelasan
                </button>


                <button
                    type="button"
                    class="ks-filter-btn"
                    data-filter="Otomotif"
                >
                    Otomotif
                </button>

            </div>

        </div>

    </section>


    {{-- =========================================================
       GRID KARYA SISWA
    ========================================================== --}}
    <section class="py-5">

        <div class="container">

            <div
                class="row g-4"
                id="ksGrid"
            >

                @forelse ($karyas as $karya)

                    <div
                        class="col-md-6 col-lg-4 ks-item"
                        data-category="{{ $karya->jurusan }}"
                    >

                        <div class="ks-card">

                            {{-- FOTO --}}
                            <div class="ks-card-image">

                                <img
                                    src="{{ asset('images/' . $karya->gambar) }}"
                                    alt="{{ $karya->nama }}"
                                    loading="lazy"
                                >


                                <span class="ks-card-badge">
                                    {{ $karya->jurusan }}
                                </span>

                            </div>


                            {{-- INFORMASI --}}
                            <div class="ks-card-body">

                                <div class="ks-card-title">
                                    {{ $karya->nama }}
                                </div>


                                <p class="ks-card-desc">
                                    {{ $karya->deskripsi }}
                                </p>


                                @if ($karya->info_tambahan)

                                    <div class="ks-card-info">

                                        <i class="bi bi-tag-fill"></i>

                                        {{ $karya->info_tambahan }}

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div
                            class="text-center py-5"
                            style="
                                background: #f8faff;
                                border: 1px solid #e6ebf3;
                                border-radius: 14px;
                            "
                        >

                            <i
                                class="bi bi-box-seam"
                                style="
                                    font-size: 38px;
                                    color: #8c98ac;
                                "
                            ></i>

                            <h5
                                class="fw-bold mt-3 mb-2"
                                style="color: #354056;"
                            >
                                Belum ada karya siswa
                            </h5>

                            <p
                                class="text-muted mb-0"
                                style="font-size: 13px;"
                            >
                                Karya siswa yang ditambahkan melalui
                                dashboard admin akan tampil di sini.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
       TEACHING FACTORY
    ========================================================== --}}
    <section class="tefa-section py-5">

        <div class="container">

            <div class="tefa-label">
                UNIT BISNIS & KOLABORASI
            </div>


            <h2
                class="fw-bold mb-2"
                style="font-size: 1.5rem;"
            >
                Teaching Factory (TeFa) SMKN 4 Bogor
            </h2>


<p
    class="text-muted mb-4 tefa-description"
>
    Melalui Teaching Factory, siswa mendapatkan pengalaman
    mengerjakan kebutuhan nyata dengan menerapkan kompetensi
    yang dipelajari di sekolah. Kegiatan dilakukan dengan
    pendampingan guru dan instruktur sesuai bidang keahlian.
</p>


            {{-- TAHAPAN TEFA --}}
            <div class="row g-3 mb-4">

                {{-- STEP 1 --}}
                <div class="col-md-4">

                    <div class="tefa-step-card">

                        <div class="tefa-step-number">
                            1
                        </div>


                        <div class="tefa-step-title">
                            Konsultasi Kebutuhan
                        </div>


                        <p class="tefa-step-desc">
                            Sampaikan kebutuhan atau spesifikasi
                            proyek yang ingin dikembangkan sesuai
                            dengan bidang keahlian yang tersedia.
                        </p>

                    </div>

                </div>


                {{-- STEP 2 --}}
                <div class="col-md-4">

                    <div class="tefa-step-card">

                        <div class="tefa-step-number">
                            2
                        </div>


                        <div class="tefa-step-title">
                            Pengerjaan Terbimbing
                        </div>


                        <p class="tefa-step-desc">
                            Proses pengerjaan dilakukan oleh siswa
                            dengan pendampingan guru dan instruktur
                            sesuai kompetensi yang dibutuhkan.
                        </p>

                    </div>

                </div>


                {{-- STEP 3 --}}
                <div class="col-md-4">

                    <div class="tefa-step-card">

                        <div class="tefa-step-number">
                            3
                        </div>


                        <div class="tefa-step-title">
                            Pemeriksaan & Penyelesaian
                        </div>


                        <p class="tefa-step-desc">
                            Hasil pekerjaan diperiksa dan disesuaikan
                            dengan kebutuhan sebelum proses
                            penyelesaian dan serah terima.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
               CTA WHATSAPP
            ================================================== --}}
            <div class="cta-banner">

                <div>

                    <div class="cta-banner-title">
                        Tertarik dengan Karya Siswa atau Ingin Kerja Sama?
                    </div>


                    <p class="cta-banner-desc">
                        Hubungi kami melalui WhatsApp untuk mengetahui
                        informasi lebih lanjut mengenai karya, produk,
                        layanan, atau peluang kerja sama dengan
                        SMKN 4 Bogor.
                    </p>

                </div>


                <a
                    href="https://wa.me/{{ $whatsapp }}?text={{ rawurlencode('Halo SMKN 4 Bogor, saya tertarik dengan karya dan produk siswa. Saya ingin mendapatkan informasi lebih lanjut mengenai pemesanan atau kerja sama.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-light rounded-2 px-4 fw-semibold text-nowrap"
                >
                    <i class="bi bi-whatsapp me-2"></i>
                    Hubungi via WhatsApp
                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
       CTA PENUTUP
    ========================================================== --}}
    <section class="py-5">

        <div class="container">

            <div
                class="cta-banner-outline
                       text-center
                       d-flex
                       flex-column
                       align-items-center"
                style="
                    border: 1px solid var(--color-border);
                    padding: 35px 30px;
                "
            >

                <div class="tefa-label">
                    KOLABORASI SEKOLAH & INDUSTRI
                </div>


                <h3
                    class="fw-bold mb-2"
                    style="font-size: 1.3rem;"
                >
                    Punya Kebutuhan atau Ide Proyek?
                </h3>


                <p
                    class="text-muted mb-4"
                    style="max-width: 650px;"
                >
                    Ceritakan kebutuhan atau ide proyek Anda kepada
                    kami. Tim SMKN 4 Bogor siap membantu menghubungkan
                    kebutuhan tersebut dengan kompetensi dan karya
                    siswa yang sesuai.
                </p>


                <a
                    href="https://wa.me/{{ $whatsapp }}?text={{ rawurlencode('Halo SMKN 4 Bogor, saya ingin berkonsultasi mengenai karya siswa dan peluang kerja sama proyek.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-primary-custom rounded-2 px-4"
                >
                    <i class="bi bi-whatsapp me-2"></i>
                    Mulai Konsultasi via WhatsApp
                </a>

            </div>

        </div>

    </section>

@endsection


{{-- =========================================================
   JAVASCRIPT FILTER
========================================================== --}}
@section('scripts')

<script>

    document
        .querySelectorAll('.ks-filter-btn')
        .forEach(function (btn) {

            btn.addEventListener(
                'click',
                function () {

                    /*
                     * Ubah tombol aktif
                     */

                    document
                        .querySelectorAll('.ks-filter-btn')
                        .forEach(function (button) {

                            button.classList.remove(
                                'active'
                            );

                        });


                    this.classList.add(
                        'active'
                    );


                    /*
                     * Ambil kategori
                     */

                    const filter =
                        this.getAttribute(
                            'data-filter'
                        );


                    /*
                     * Tampilkan karya
                     * sesuai kategori
                     */

                    document
                        .querySelectorAll('.ks-item')
                        .forEach(function (item) {

                            const category =
                                item.getAttribute(
                                    'data-category'
                                );


                            if (
                                filter === 'Semua' ||
                                category === filter
                            ) {

                                item.style.display =
                                    '';

                            } else {

                                item.style.display =
                                    'none';

                            }

                        });

                }
            );

        });

</script>

@endsection