@extends('layouts.app')

@section('title', 'Galeri - SMK Negeri 4 Kota Bogor')

@section('content')

<div class="galeri-page">

    {{-- HEADER --}}
    <section class="galeri-page-hero">
        <div class="galeri-hero-inner">
            <div class="galeri-eyebrow">VISUAL DOCUMENTATION</div>

            <h1>Galeri Kegiatan</h1>

            <p>
                Eksplorasi ragam prestasi, sarana pendukung pembelajaran,
                dan momen-momen inspiratif seluruh civitas akademika
                SMK Negeri 4 Kota Bogor.
            </p>
        </div>
    </section>


    {{-- FILTER --}}
    <div class="galeri-content">

        <div class="galeri-filter-wrap">

            <button class="ks-filter-btn active" data-filter="Semua">
                Semua
            </button>

            <button class="ks-filter-btn" data-filter="Kegiatan Siswa">
                Kegiatan Siswa
            </button>

            <button class="ks-filter-btn" data-filter="Prestasi">
                Prestasi
            </button>

            <button class="ks-filter-btn" data-filter="Lingkungan Sekolah">
                Lingkungan Sekolah
            </button>

        </div>


        {{-- GRID --}}
        <div class="galeri-card-grid" id="galeriGrid">

            @foreach ($galeris as $index => $item)

                <article
                    class="galeri-card {{ $index >= 6 ? 'galeri-hidden' : '' }}"
                    data-category="{{ $item->kategori }}"
                    data-id="{{ $item->id }}"
                >

                    {{-- FOTO --}}
                    <div
                        class="galeri-card-image"
                      onclick="bukaGaleri(
    '{{ asset('images/' . $item->gambar) }}',
    '{{ addslashes($item->judul) }}',
    '{{ $item->tanggal ? $item->tanggal->translatedFormat('d F Y') : '' }}',
    '{{ $item->id }}'
)"
                    >
                        <img
                            src="{{ asset('images/' . $item->gambar) }}"
                            alt="{{ $item->judul }}"
                        >
                    </div>


                    {{-- INFORMASI --}}
                    <div class="galeri-card-body">

                        {{-- ACTION --}}
        <div class="galeri-card-actions">

    <button
        type="button"
        class="galeri-action like-btn"
        data-id="{{ $item->id }}"
        onclick="event.stopPropagation(); toggleLike({{ $item->id }}, this)"
        title="Suka"
    >
        <i class="bi bi-heart"></i>
    </button>

    <button
        type="button"
        class="galeri-action share-btn"
        onclick="event.stopPropagation(); shareGaleri(
            '{{ addslashes($item->judul) }}',
            '{{ url('/galeri#galeri-' . $item->id) }}'
        )"
        title="Bagikan"
    >
        <i class="bi bi-send"></i>
    </button>

</div>


                        {{-- JUDUL --}}
                        <h3>
                            {{ $item->judul }}
                        </h3>


                        {{-- TANGGAL --}}
                        <div class="galeri-card-date">
                            {{ $item->tanggal
                                ? $item->tanggal->format('d-m-y')
                                : '-' }}
                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        {{-- LOAD MORE --}}
        @if ($galeris->count() > 6)

            <button
                class="galeri-load-more"
                id="galeriLoadMoreBtn"
            >
                <i class="bi bi-chevron-down"></i>
                Muat Lebih Banyak
            </button>

        @endif

    </div>

</div>

{{-- MODAL LIGHTBOX --}}
<div
    class="modal fade galeri-lightbox"
    id="galeriModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            {{-- TOMBOL TUTUP --}}
            <button
                type="button"
                class="galeri-lightbox-close"
                data-bs-dismiss="modal"
                aria-label="Tutup"
            >
                <i class="bi bi-x-lg"></i>
            </button>

            {{-- GAMBAR --}}
            <div class="galeri-lightbox-image">

                <img
                    id="galeriModalImg"
                    src=""
                    alt="Foto Galeri"
                >

            </div>

            {{-- INFORMASI --}}
            <div class="galeri-lightbox-info">

                {{-- ACTION --}}
                <div class="galeri-lightbox-actions">

                    {{-- LIKE --}}
                    <button
                        type="button"
                        id="galeriModalLike"
                        class="galeri-lightbox-action"
                        title="Suka"
                    >
                        <i class="bi bi-heart"></i>
                    </button>

                    {{-- SALIN LINK --}}
                    <button
                        type="button"
                        id="galeriModalShare"
                        class="galeri-lightbox-action"
                        title="Salin Link"
                    >
                        <i class="bi bi-link-45deg"></i>
                    </button>

                </div>

                {{-- JUDUL --}}
                <h3 id="galeriModalDesc"></h3>

                {{-- TANGGAL --}}
                <div class="galeri-lightbox-date">

                    <i class="bi bi-calendar3"></i>

                    <span id="galeriModalDate"></span>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection


@section('scripts')

<script>

    /* =========================================================
       MODAL LIGHTBOX
    ========================================================== */

    const galeriModalElement =
        document.getElementById('galeriModal');

    const galeriModal =
        new bootstrap.Modal(galeriModalElement);

    const galeriModalImg =
        document.getElementById('galeriModalImg');

    const galeriModalDesc =
        document.getElementById('galeriModalDesc');

    const galeriModalDate =
        document.getElementById('galeriModalDate');

    const galeriModalLike =
        document.getElementById('galeriModalLike');

    const galeriModalShare =
        document.getElementById('galeriModalShare');


    function bukaGaleri(src, judul, tanggal, id) {

        galeriModalImg.src = src;

        galeriModalDesc.textContent = judul;

        galeriModalDate.textContent = tanggal;

        galeriModalLike.dataset.id = id;

        updateModalLikeButton(id);


        // LIKE DARI DALAM LIGHTBOX
        galeriModalLike.onclick = function () {

            toggleLike(id, galeriModalLike);

        };


        // SALIN LINK
        galeriModalShare.onclick = function () {

            copyGaleriLink(
                "{{ url('/galeri') }}#galeri-" + id
            );

        };


        galeriModal.show();
    }



    /* =========================================================
       FILTER
    ========================================================== */

    const filterBtns =
        document.querySelectorAll(
            '.galeri-filter-wrap .ks-filter-btn'
        );

    const items =
        document.querySelectorAll(
            '.galeri-card'
        );

    const loadMoreBtn =
        document.getElementById(
            'galeriLoadMoreBtn'
        );

    let activeCategory = 'Semua';

    let visibleCount = 6;


    function renderItems() {

        const filtered =
            Array.from(items).filter(item => {

                return activeCategory === 'Semua' ||
                    item.dataset.category === activeCategory;

            });


        items.forEach(item => {

            item.classList.add(
                'galeri-hidden'
            );

        });


        filtered
            .slice(0, visibleCount)
            .forEach(item => {

                item.classList.remove(
                    'galeri-hidden'
                );

            });


        if (loadMoreBtn) {

            loadMoreBtn.style.display =
                visibleCount >= filtered.length
                    ? 'none'
                    : 'inline-flex';

        }

    }


    filterBtns.forEach(btn => {

        btn.addEventListener(
            'click',
            function () {

                filterBtns.forEach(b =>
                    b.classList.remove('active')
                );


                this.classList.add('active');


                activeCategory =
                    this.dataset.filter;


                visibleCount = 6;


                renderItems();

            }
        );

    });


    if (loadMoreBtn) {

        loadMoreBtn.addEventListener(
            'click',
            function () {

                visibleCount += 6;

                renderItems();

            }
        );

    }



    /* =========================================================
       LIKE
    ========================================================== */

    function getLikedGaleri() {

        return JSON.parse(
            localStorage.getItem(
                'likedGaleri'
            ) || '[]'
        );

    }


    function toggleLike(id, button = null) {

        let liked =
            getLikedGaleri();

        id = String(id);


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

        .then(response =>
            response.json()
        )

        .then(data => {

            if (!data.success) {
                return;
            }


            if (sudahLike) {

                liked =
                    liked.filter(
                        item => item !== id
                    );

            } else {

                liked.push(id);

            }


            localStorage.setItem(
                'likedGaleri',
                JSON.stringify(liked)
            );


            // UPDATE SEMUA TOMBOL LIKE
            updateLikeButtons();


            // UPDATE LIKE DI LIGHTBOX
            updateModalLikeButton(id);

        })

        .catch(error => {

            console.error(
                'Like error:',
                error
            );

        });

    }



    function updateLikeButtons() {

        const liked =
            getLikedGaleri();


        document
            .querySelectorAll('.like-btn')
            .forEach(button => {

                const id =
                    String(
                        button.dataset.id
                    );


                if (liked.includes(id)) {

                    button.classList.add(
                        'liked'
                    );

                    button.innerHTML =
                        '<i class="bi bi-heart-fill"></i>';

                } else {

                    button.classList.remove(
                        'liked'
                    );

                    button.innerHTML =
                        '<i class="bi bi-heart"></i>';

                }

            });

    }



    function updateModalLikeButton(id) {

        const liked =
            getLikedGaleri();

        id = String(id);


        if (liked.includes(id)) {

            galeriModalLike.classList.add(
                'liked'
            );

            galeriModalLike.innerHTML =
                '<i class="bi bi-heart-fill"></i>';

        } else {

            galeriModalLike.classList.remove(
                'liked'
            );

            galeriModalLike.innerHTML =
                '<i class="bi bi-heart"></i>';

        }

    }



    /* =========================================================
       SALIN LINK
    ========================================================== */

    function copyGaleriLink(url) {

        navigator.clipboard
            .writeText(url)

            .then(function () {

                alert(
                    'Link galeri berhasil disalin!'
                );

            })

            .catch(function () {

                alert(
                    'Link gagal disalin.'
                );

            });

    }



    /* =========================================================
       SHARE
    ========================================================== */

    function shareGaleri(judul, url) {

        if (navigator.share) {

            navigator.share({

                title: judul,

                text:
                    'Lihat kegiatan SMKN 4 Bogor: ' +
                    judul,

                url: url

            });

        } else {

            copyGaleriLink(url);

        }

    }



    /* =========================================================
       INITIAL
    ========================================================== */

    updateLikeButtons();

    renderItems();

</script>

@endsection