@extends('layouts.app')

@section('title', 'Berita - SMK Negeri 4 Kota Bogor')

@section('content')

<div class="container py-5">
    <h1 class="berita-page-title">Berita</h1>

    {{-- FEATURED BERITA DENGAN CAROUSEL --}}
    @if ($featured)
        <div class="featured-berita-card">
            <div class="row g-0">
                <div class="col-lg-7">
                    <div id="featuredCarousel" class="carousel slide featured-carousel" data-bs-ride="carousel" data-bs-interval="2500">
                        <div class="carousel-inner h-100">
                            @foreach ($featured->gambar as $index => $gambar)
                                <div class="carousel-item h-100 {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/' . $gambar) }}" alt="{{ $featured->judul }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="featured-content">
                        <div class="featured-category">{{ $featured->kategori }}</div>
                        <h2 class="featured-title">{{ $featured->judul }}</h2>
                        <div class="news-meta mb-3">
                            <span><i class="bi bi-calendar3"></i>{{ $featured->tanggal->translatedFormat('d F Y') }}</span>
                            <span><i class="bi bi-person-fill"></i>{{ $featured->penulis }}</span>
                        </div>
                        <p class="news-desc">{{ $featured->ringkasan }}</p>
                        <a href="{{ url('/berita/' . $featured->id) }}" class="news-link">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- SEARCH & FILTER --}}
    <div class="berita-search-bar d-flex flex-wrap align-items-center gap-3">
        <div style="flex: 1; min-width: 220px;">
            <input type="text" id="beritaSearchInput" class="berita-search-input" placeholder="Cari berita atau pengumuman...">
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="small text-muted">Kategori:</span>
            <button class="ks-filter-btn active" data-filter="Semua">Semua</button>
            <button class="ks-filter-btn" data-filter="Prestasi">Prestasi</button>
            <button class="ks-filter-btn" data-filter="Kegiatan">Kegiatan</button>
            <button class="ks-filter-btn" data-filter="Pengumuman">Pengumuman</button>
        </div>
    </div>

    {{-- GRID BERITA --}}
    <div class="row g-4" id="beritaGrid">
        @foreach ($beritas as $berita)
            <div class="col-md-6 col-lg-4 berita-item" data-category="{{ $berita->kategori }}" data-title="{{ strtolower($berita->judul) }}">
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="{{ asset('images/' . $berita->gambar[0]) }}" alt="{{ $berita->judul }}">
                        <span class="news-badge">{{ $berita->kategori }}</span>
                    </div>
                    <div class="news-card-body">
                        <div class="news-meta">
                            <span><i class="bi bi-calendar3"></i>{{ $berita->tanggal->translatedFormat('d M Y') }}</span>
                            <span><i class="bi bi-person-fill"></i>{{ $berita->penulis }}</span>
                        </div>
                        <div class="news-title">{{ $berita->judul }}</div>
                        <div class="news-desc">{{ $berita->ringkasan }}</div>
                        <a href="{{ url('/berita/' . $berita->id) }}" class="news-link">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    <div class="news-pagination">
    {{ $beritas->links() }}
</div>

</div>

@endsection

@section('scripts')
<script>
    const searchInput = document.getElementById('beritaSearchInput');
    const items = document.querySelectorAll('.berita-item');
    let activeCategory = 'Semua';

    function applyFilter() {
        const keyword = searchInput.value.toLowerCase();
        items.forEach(item => {
            const matchCategory = activeCategory === 'Semua' || item.getAttribute('data-category') === activeCategory;
            const matchSearch = item.getAttribute('data-title').includes(keyword);
            item.style.display = (matchCategory && matchSearch) ? '' : 'none';
        });
    }

    document.querySelectorAll('.berita-search-bar .ks-filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.berita-search-bar .ks-filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            activeCategory = this.getAttribute('data-filter');
            applyFilter();
        });
    });

    searchInput.addEventListener('input', applyFilter);
</script>
@endsection