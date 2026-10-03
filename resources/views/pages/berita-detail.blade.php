@extends('layouts.app')

@section('title', $berita->judul . ' - SMK Negeri 4 Kota Bogor')

@section('content')

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <span class="featured-category">{{ $berita->kategori }}</span>
            <h1 class="detail-berita-title">{{ $berita->judul }}</h1>
            <div class="news-meta mb-4">
                <span><i class="bi bi-calendar3"></i>{{ $berita->tanggal->translatedFormat('d F Y') }}</span>
                <span><i class="bi bi-person-fill"></i>{{ $berita->penulis }}</span>
            </div>

            <img src="{{ asset('images/' . $berita->gambar[0]) }}" alt="{{ $berita->judul }}" class="detail-berita-image">

            <div class="detail-berita-content">

    @php
        // Samakan format enter dari textarea
        $isi = str_replace(["\r\n", "\r"], "\n", $berita->isi);

        // Pisahkan setiap blok berdasarkan baris kosong
        $blokBerita = preg_split("/\n\s*\n/", trim($isi));
    @endphp

    @foreach ($blokBerita as $blok)

        @php
            $blok = trim($blok);
        @endphp

        @if (str_starts_with($blok, '## '))
            
            <h3 class="detail-subheading">
                {{ trim(substr($blok, 3)) }}
            </h3>

        @elseif (str_starts_with($blok, '> '))

            @php
                $parts = explode('|', substr($blok, 2), 2);
            @endphp

            <div class="detail-quote-box">

                <p class="detail-quote-text">
                    "{{ trim($parts[0]) }}"
                </p>

                @if (isset($parts[1]))
                    <p class="detail-quote-author">
                        — {{ trim($parts[1]) }}
                    </p>
                @endif

            </div>

        @else

            <p>
                {{ trim($blok) }}
            </p>

        @endif

    @endforeach

</div>

            <div class="detail-share-section">
                <a href="{{ url('/berita') }}" class="news-link"><i class="bi bi-arrow-left"></i> Kembali ke Semua Berita</a>
                <div class="d-flex align-items-center gap-2">
                    <span class="detail-share-label me-1">Bagikan:</span>
                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url('/berita/' . $berita->id)) }}" target="_blank" class="detail-share-btn"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/berita/' . $berita->id)) }}" target="_blank" class="detail-share-btn"><i class="bi bi-facebook"></i></a>
                    <button type="button" class="detail-share-btn border-0" onclick="navigator.clipboard.writeText('{{ url('/berita/' . $berita->id) }}'); alert('Link disalin!');"><i class="bi bi-link-45deg"></i></button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="contact-info-card">
                <div class="sidebar-title">Berita Terpopuler</div>
                @foreach ($terpopuler as $item)
                    <a href="{{ url('/berita/' . $item->id) }}" class="sidebar-item">
                        <img src="{{ asset('images/' . $item->gambar[0]) }}" alt="{{ $item->judul }}" class="sidebar-item-img">
                        <div>
                            <div class="sidebar-item-title">{{ $item->judul }}</div>
                            <div class="sidebar-item-date">{{ $item->tanggal->translatedFormat('d M Y') }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection