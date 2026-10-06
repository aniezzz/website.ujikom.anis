@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 4 Kota Bogor')

@section('content')

    {{-- =========================================================
       HERO SECTION
    ========================================================== --}}
    <section class="hero-section" style="background-image: url('{{ asset('images/hero-sekolah.jpg') }}');">
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-7">

                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem;">
                     Selamat Datang Di Sistem Informasi SMK Negeri 4 Kota Bogor
                    </h1>

                    <p class="mb-4" style="font-size: 1rem; color: #E8E8E8;">
                        Membangun Generasi Unggul, Berkarakter, Kompeten,
                        dan Siap Menghadapi Dunia Kerja maupun Perguruan Tinggi
                    </p>

                    <div class="d-flex gap-3">

                        <a
                            href="{{ url('/profil') }}"
                            class="btn btn-primary-custom rounded-pill px-4 py-2"
                        >
                            Jelajahi Sekolah
                        </a>

                        <a
                            href="{{ url('/kontak') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2"
                        >
                            Hubungi Kami
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
       STATS CARDS
    ========================================================== --}}
    <div class="container stats-wrapper">

        <div class="row g-3">

            <div class="col-6 col-lg-3">
                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div class="stats-number">
                        <span class="counter" data-target="1200">0</span>+
                    </div>

                    <div class="stats-label">
                        Siswa Aktif
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div class="stats-number">
                        <span class="counter" data-target="65">0</span>+
                    </div>

                    <div class="stats-label">
                        Tenaga Pendidik
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <div class="stats-number">
                        <span class="counter" data-target="4">0</span>
                    </div>

                    <div class="stats-label">
                        Program Keahlian
                    </div>

                </div>
            </div>


            <div class="col-6 col-lg-3">
                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>

                    <div class="stats-number">
                        <span class="counter" data-target="50">0</span>+
                    </div>

                    <div class="stats-label">
                        Prestasi Sekolah
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="mb-5"></div>

{{-- =========================================================
   ABOUT SECTION
========================================================= --}}
<section class="about-home-section py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- KOLOM FOTO --}}
            <div class="col-lg-6">

                <div class="about-home-visual">

                    {{-- FOTO UTAMA --}}
                    <div class="about-home-main-image">

                        <img
                            src="{{ asset('images/hero-sekolah1.jpg') }}"
                            alt="SMK Negeri 4 Kota Bogor"
                        >

                    </div>

                    {{-- KARTU AKREDITASI --}}
                    <div class="about-home-accreditation">

                        <div class="about-small-icon">
                            <i class="bi bi-award"></i>
                        </div>

                        <div>
                            <span>AKREDITASI</span>
                            <strong>A</strong>
                        </div>

                    </div>

                    {{-- KARTU TAHUN --}}
                    <div class="about-home-year">

                        <strong>20+</strong>

                        <span>
                            Tahun pengabdian<br>
                            dalam pendidikan
                        </span>

                    </div>

                    {{-- FOTO KEGIATAN --}}
                    <div class="about-home-secondary-image">

                        <img
                            src="{{ asset('images/program-rpl1.jpg') }}"
                            alt="Kegiatan siswa SMK Negeri 4 Kota Bogor"
                        >

                    </div>

                </div>

            </div>


            {{-- KOLOM INFORMASI --}}
            <div class="col-lg-6">

                <div class="about-home-content">

                    <div class="about-home-label">
                        Tentang Kami
                    </div>

                    <h2>
                        SMK Negeri 4 Kota Bogor:
                        <span>Pusat Keunggulan Vokasi</span>
                    </h2>

                    <p>
                        SMK Negeri 4 Kota Bogor merupakan sekolah kejuruan
                        yang berkomitmen memberikan pendidikan berbasis
                        kompetensi serta membekali peserta didik dengan
                        keterampilan yang sesuai dengan perkembangan dunia kerja.
                    </p>

                    <p>
                        Kami percaya bahwa setiap siswa memiliki potensi unik.
                        Melalui pembelajaran yang mendukung kreativitas,
                        keterampilan, dan karakter, kami mempersiapkan peserta
                        didik untuk terus berkembang dan menghadapi masa depan.
                    </p>


                    {{-- HIGHLIGHT --}}
                    <div class="about-home-highlights">

                        <div class="about-home-highlight">

                            <div class="about-highlight-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <div>
                                <strong>Kualitas Terjamin</strong>

                                <span>
                                    Pembelajaran berbasis kompetensi.
                                </span>
                            </div>

                        </div>


                        <div class="about-home-highlight">

                            <div class="about-highlight-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            <div>
                                <strong>Jejaring Luas</strong>

                                <span>
                                    Terhubung dengan dunia industri.
                                </span>
                            </div>

                        </div>

                    </div>


                    {{-- TOMBOL --}}
                    <a
                        href="{{ url('/profil') }}"
                        class="about-home-button"
                    >
                        Lihat Profil
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


   {{-- =========================================================
   PROGRAM KEAHLIAN SECTION
========================================================= --}}
<section class="program-section py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- TEKS --}}
            <div class="col-lg-5">

                <div class="program-home-label">
                    PROGRAM KEAHLIAN
                </div>

                <h2 class="program-home-title">
                    “Yuk, jelajahi berbagai pilihan program keahlian di SMKN 4 Bogor!”
                </h2>

                <p class="program-home-desc">
                    Temukan bidang yang sesuai dengan minat dan potensimu.
                </p>

                <a href="{{ url('/produk/program-keahlian') }}"
                   class="about-home-button">
                    Lihat Program Keahlian
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>


            {{-- 4 FOTO --}}
            <div class="col-lg-7">

                <div class="program-home-gallery">

                    {{-- Pengelasan --}}
                    <div class="program-home-photo">
                        <img src="{{ asset('images/program-pengelasan.jpeg') }}"
                             alt="Program Keahlian Pengelasan">
                    </div>

                    {{-- PPLG --}}
                    <div class="program-home-photo">
                        <img src="{{ asset('images/program-rpl.jpg') }}"
                             alt="Program Keahlian PPLG">
                    </div>

                    {{-- TJKT --}}
                    <div class="program-home-photo">
                        <img src="{{ asset('images/program-tjkt.jpg') }}"
                             alt="Program Keahlian TJKT">
                    </div>

                    {{-- Otomotif --}}
                    <div class="program-home-photo">
                        <img src="{{ asset('images/program-otomotif.png') }}"
                             alt="Program Keahlian Otomotif">
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

    {{-- =========================================================
       BERITA TERKINI SECTION
    ========================================================== --}}
    <section class="news-section py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <h2
                        class="fw-bold mb-1"
                        style="font-size: 1.4rem;"
                    >
                        Berita Terkini
                    </h2>

                    <p class="mb-0 text-muted small">
                        Update informasi terbaru seputar kegiatan
                        dan prestasi sekolah
                    </p>

                </div>


                <a
                    href="{{ url('/berita') }}"
                    class="news-link news-link-underline text-nowrap"
                >
                    Lihat Semua Berita
                </a>

            </div>


            <div class="row g-4">

                @foreach ($beritaTerkini as $berita)

                    <div class="col-md-6 col-lg-4">

                        <div class="news-card">

                            <div class="news-image-wrapper">

                                <img
                                    src="{{ asset('images/' . $berita->gambar[0]) }}"
                                    alt="{{ $berita->judul }}"
                                >

                                <span class="news-badge">
                                    {{ $berita->kategori }}
                                </span>

                            </div>


                            <div class="news-card-body">

                                <div class="news-meta">

                                    <span>
                                        <i class="bi bi-calendar3"></i>
                                        {{ $berita->tanggal->translatedFormat('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="bi bi-person-fill"></i>
                                        {{ $berita->penulis }}
                                    </span>

                                </div>


                                <div class="news-title">
                                    {{ $berita->judul }}
                                </div>


                                <div class="news-desc">
                                    {{ $berita->ringkasan }}
                                </div>


                                <a
                                    href="{{ url('/berita/' . $berita->id) }}"
                                    class="news-link"
                                >
                                    Baca Selengkapnya &rarr;
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================================================
       GALERI SECTION - COVERFLOW
    ========================================================== --}}
    <section class="home-gallery-section py-5">

        <div class="container">

            {{-- HEADER --}}
            <div class="home-gallery-heading">

                <div>

                    <h2 class="fw-bold mb-1">
                        Galeri SMKN 4 BOGOR
                    </h2>

                    <p class="mb-0 text-muted">
                        Momen kegiatan dan prestasi terbaru SMKN 4 Bogor
                    </p>

                </div>


                <a
                    href="{{ url('/galeri') }}"
                    class="news-link news-link-underline"
                >
                    Lihat Semua Galeri
                </a>

            </div>


            {{-- GALERI --}}
            @if ($galeris->count() > 0)

                <div class="home-gallery-coverflow">

                    <div
                        class="home-gallery-track"
                        id="homeGalleryTrack"
                    >

                        @foreach ($galeris as $index => $item)

                            <article
                                class="home-gallery-slide"
                                data-index="{{ $index }}"
                            >

                                {{-- FOTO --}}
                                <div class="home-gallery-image">

                                    <img
                                        src="{{ asset('images/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        loading="lazy"
                                    >

                                </div>


                                {{-- INFORMASI --}}
                                <div class="home-gallery-body">

                                    {{-- ACTION --}}
                                    <div class="home-gallery-actions">

                                        {{-- LIKE --}}
                                        <button
                                            type="button"
                                            class="home-gallery-action home-like-btn"
                                            data-id="{{ $item->id }}"
                                            onclick="event.stopPropagation(); toggleHomeLike({{ $item->id }}, this)"
                                            title="Suka"
                                            aria-label="Suka {{ $item->judul }}"
                                        >
                                            <i class="bi bi-heart"></i>
                                        </button>


                                        {{-- SHARE --}}
                                        <button
                                            type="button"
                                            class="home-gallery-action"
                                            onclick="event.stopPropagation(); shareHomeGaleri(@js($item->judul), @js(url('/galeri#galeri-' . $item->id)))"
                                            title="Bagikan"
                                            aria-label="Bagikan {{ $item->judul }}"
                                        >
                                            <i class="bi bi-send"></i>
                                        </button>

                                    </div>


                                    {{-- JUDUL --}}
                                    <h3>
                                        {{ $item->judul }}
                                    </h3>


                                    {{-- TANGGAL --}}
                                    <div class="home-gallery-date">

                                        {{ $item->tanggal
                                            ? $item->tanggal->format('d-m-y')
                                            : '-' }}

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>


                    {{-- NAVIGASI --}}
                    @if ($galeris->count() > 1)

                        <button
                            type="button"
                            class="home-gallery-nav home-gallery-prev"
                            id="homeGalleryPrev"
                            aria-label="Foto sebelumnya"
                        >
                            <i class="bi bi-chevron-left"></i>
                        </button>


                        <button
                            type="button"
                            class="home-gallery-nav home-gallery-next"
                            id="homeGalleryNext"
                            aria-label="Foto berikutnya"
                        >
                            <i class="bi bi-chevron-right"></i>
                        </button>

                    @endif

                </div>

            @else

                <div class="home-gallery-empty">

                    <i class="bi bi-images"></i>

                    <p>
                        Belum ada foto galeri.
                    </p>

                </div>

            @endif

        </div>

    </section>


    {{-- =========================================================
       INFORMASI KONTAK SECTION
    ========================================================== --}}
    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                {{-- INFORMASI KONTAK --}}
                <div class="col-lg-5">

                    <div class="contact-info-card">

                        <h5 class="fw-bold mb-4">
                            Informasi Kontak
                        </h5>


                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>

                                <div class="contact-label">
                                    Alamat Utama
                                </div>

                                <p class="contact-value">
                                    Jl. Raya Tajur, Kp. Buntar,
                                    Kota Bogor, Jawa Barat
                                </p>

                            </div>

                        </div>


                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div>

                                <div class="contact-label">
                                    Telepon
                                </div>

                                <p class="contact-value">
                                    (0251) 1234567
                                </p>

                            </div>

                        </div>


                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div>

                                <div class="contact-label">
                                    Email Resmi
                                </div>

                                <p class="contact-value">
                                    info@smkn4bogor.sch.id
                                </p>

                            </div>

                        </div>


                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="bi bi-clock-fill"></i>
                            </div>

                            <div>

                                <div class="contact-label">
                                    Jam Operasional
                                </div>

                                <p class="contact-value">
                                    Senin - Jumat, 07:00 - 16:00 WIB
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- MAP --}}
                <div class="col-lg-7">

                    <div class="map-wrapper">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049839558919!2d106.8246939!3d-6.640733399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1788401576838!5m2!1sid!2sid"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                        >
                        </iframe>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
       MODAL LIGHTBOX GALERI
    ========================================================== --}}
    <div
        class="modal fade"
        id="galeriModal"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content border-0 bg-transparent">

                <div class="modal-body p-0 text-center">

                    <img
                        id="galeriModalImg"
                        src=""
                        class="img-fluid rounded-3"
                        alt="Foto Galeri"
                    >

                    <div class="mt-3">

                        <p
                            id="galeriModalDesc"
                            class="mb-0"
                        >
                        </p>

                        <span id="galeriModalDate"></span>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


{{-- =========================================================
   JAVASCRIPT
========================================================== --}}
@section('scripts')

<script>

    /* =====================================================
       MODAL GALERI
    ====================================================== */

    const galeriModalElement =
        document.getElementById('galeriModal');

    let galeriModal = null;

    if (galeriModalElement) {

        galeriModal =
            new bootstrap.Modal(
                galeriModalElement
            );

    }


    const galeriModalImg =
        document.getElementById(
            'galeriModalImg'
        );

    const galeriModalDesc =
        document.getElementById(
            'galeriModalDesc'
        );

    const galeriModalDate =
        document.getElementById(
            'galeriModalDate'
        );


    function bukaGaleri(
        src,
        judul,
        tanggal
    ) {

        if (!galeriModal) {
            return;
        }

        galeriModalImg.src = src;

        galeriModalDesc.textContent =
            judul;

        galeriModalDate.textContent =
            tanggal;

        galeriModal.show();

    }


    /* =====================================================
       VIDEO
    ====================================================== */

    function putarVideo(
        frameId,
        driveId
    ) {

        const frame =
            document.getElementById(
                frameId
            );

        if (!frame) {
            return;
        }


        frame.innerHTML =
            `<iframe
                src="https://drive.google.com/file/d/${driveId}/preview"
                allow="autoplay"
                allowfullscreen
                style="width:100%; height:100%; border:0;">
            </iframe>`;

    }


    /* =====================================================
       LIKE GALERI BERANDA
    ====================================================== */

    function getHomeLikedGaleri() {

        try {

            return JSON.parse(
                localStorage.getItem(
                    'likedGaleri'
                ) || '[]'
            );

        } catch (error) {

            return [];

        }

    }


    function syncHomeLikeButtons() {

        const liked =
            getHomeLikedGaleri();


        document
            .querySelectorAll(
                '.home-like-btn'
            )
            .forEach(
                function (button) {

                    const id =
                        String(
                            button.dataset.id
                        );

                    const icon =
                        button.querySelector(
                            'i'
                        );


                    if (
                        liked.includes(id)
                    ) {

                        button.classList.add(
                            'liked'
                        );

                        if (icon) {

                            icon.className =
                                'bi bi-heart-fill';

                        }

                    } else {

                        button.classList.remove(
                            'liked'
                        );

                        if (icon) {

                            icon.className =
                                'bi bi-heart';

                        }

                    }

                }
            );

    }


    function toggleHomeLike(
        id,
        button
    ) {

        let liked =
            getHomeLikedGaleri();

        id =
            String(id);


        const sudahLike =
            liked.includes(id);


        const action =
            sudahLike
                ? 'unlike'
                : 'like';


        fetch(
            "{{ url('/galeri') }}/" +
            id +
            "/like",
            {
                method: 'POST',

                headers: {

                    'Content-Type':
                        'application/json',

                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}',

                    'Accept':
                        'application/json'

                },

                body: JSON.stringify({

                    action: action

                })

            }
        )

        .then(
            function (response) {

                if (!response.ok) {

                    throw new Error(
                        'Gagal menghubungi server.'
                    );

                }

                return response.json();

            }
        )

        .then(
            function (data) {

                if (!data.success) {
                    return;
                }


                if (sudahLike) {

                    liked =
                        liked.filter(
                            function (item) {
                                return item !== id;
                            }
                        );

                    button.classList.remove(
                        'liked'
                    );


                    const icon =
                        button.querySelector(
                            'i'
                        );

                    if (icon) {

                        icon.className =
                            'bi bi-heart';

                    }

                } else {

                    liked.push(id);


                    button.classList.add(
                        'liked'
                    );


                    const icon =
                        button.querySelector(
                            'i'
                        );

                    if (icon) {

                        icon.className =
                            'bi bi-heart-fill';

                    }

                }


                localStorage.setItem(
                    'likedGaleri',
                    JSON.stringify(
                        liked
                    )
                );

            }
        )

        .catch(
            function (error) {

                console.error(
                    'Like error:',
                    error
                );

            }
        );

    }


    /* =====================================================
       SHARE GALERI
    ====================================================== */

    function shareHomeGaleri(
        judul,
        url
    ) {

        if (
            navigator.share
        ) {

            navigator.share({

                title: judul,

                text:
                    'Lihat kegiatan SMKN 4 Bogor: ' +
                    judul,

                url: url

            }).catch(
                function () {}
            );

        } else if (
            navigator.clipboard
        ) {

            navigator.clipboard
                .writeText(url)
                .then(
                    function () {

                        alert(
                            'Link galeri berhasil disalin!'
                        );

                    }
                );

        } else {

            prompt(
                'Salin link galeri ini:',
                url
            );

        }

    }


    /* =====================================================
       GALERI COVERFLOW
    ====================================================== */

    const gallerySlides =
        document.querySelectorAll(
            '.home-gallery-slide'
        );


    const galleryPrev =
        document.getElementById(
            'homeGalleryPrev'
        );


    const galleryNext =
        document.getElementById(
            'homeGalleryNext'
        );


    let galleryCurrent = 0;

    let galleryAutoPlay = null;


    function updateGalleryCoverflow() {

        const total =
            gallerySlides.length;


        if (total === 0) {
            return;
        }


        gallerySlides.forEach(
            function (
                slide,
                index
            ) {

                slide.classList.remove(
                    'is-center',
                    'is-left',
                    'is-right',
                    'is-far-left',
                    'is-far-right'
                );


                let diff =
                    index -
                    galleryCurrent;


                /*
                 * Membuat carousel
                 * berputar tanpa mentok.
                 */

                if (
                    diff >
                    total / 2
                ) {

                    diff -= total;

                }


                if (
                    diff <
                    -(total / 2)
                ) {

                    diff += total;

                }


                if (
                    diff === 0
                ) {

                    slide.classList.add(
                        'is-center'
                    );

                }

                else if (
                    diff === -1
                ) {

                    slide.classList.add(
                        'is-left'
                    );

                }

                else if (
                    diff === 1
                ) {

                    slide.classList.add(
                        'is-right'
                    );

                }

                else if (
                    diff < 0
                ) {

                    slide.classList.add(
                        'is-far-left'
                    );

                }

                else {

                    slide.classList.add(
                        'is-far-right'
                    );

                }

            }
        );

    }


    function nextGallery() {

        if (
            gallerySlides.length <= 1
        ) {
            return;
        }


        galleryCurrent++;


        if (
            galleryCurrent >=
            gallerySlides.length
        ) {

            galleryCurrent = 0;

        }


        updateGalleryCoverflow();

    }


    function prevGallery() {

        if (
            gallerySlides.length <= 1
        ) {
            return;
        }


        galleryCurrent--;


        if (
            galleryCurrent < 0
        ) {

            galleryCurrent =
                gallerySlides.length - 1;

        }


        updateGalleryCoverflow();

    }


    function startGalleryAutoPlay() {

        if (
            gallerySlides.length <= 1
        ) {
            return;
        }


        galleryAutoPlay =
            setInterval(
                function () {

                    nextGallery();

                },
                3500
            );

    }


    function restartGalleryAutoPlay() {

        if (
            galleryAutoPlay
        ) {

            clearInterval(
                galleryAutoPlay
            );

        }


        startGalleryAutoPlay();

    }


    /* =====================================================
       TOMBOL SEBELUMNYA
    ====================================================== */

    if (galleryPrev) {

        galleryPrev.addEventListener(
            'click',
            function () {

                prevGallery();

                restartGalleryAutoPlay();

            }
        );

    }


    /* =====================================================
       TOMBOL BERIKUTNYA
    ====================================================== */

    if (galleryNext) {

        galleryNext.addEventListener(
            'click',
            function () {

                nextGallery();

                restartGalleryAutoPlay();

            }
        );

    }


    /* =====================================================
       JALANKAN GALERI
    ====================================================== */

    updateGalleryCoverflow();

    startGalleryAutoPlay();


    /* =====================================================
       SYNC LIKE SAAT HALAMAN DIBUKA
    ====================================================== */

    syncHomeLikeButtons();

</script>

@endsection