@extends('layouts.dashboard')

@section('title', 'Detail Pesan')

@section('content')

<div class="content-page">

    {{-- HEADER --}}
    <div class="content-page-header">

        <div>
            <div class="content-eyebrow">
                KOTAK MASUK
            </div>

            <h1>
                Detail Pesan
            </h1>

            <p>
                Lihat informasi lengkap pesan yang dikirim melalui website.
            </p>
        </div>

        <a
            href="{{ route('admin.pesan.index') }}"
            class="btn-back-content"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- DETAIL PESAN --}}
    <div class="message-detail-card">

        {{-- HEADER PESAN --}}
        <div class="message-detail-header">

            <div class="message-detail-icon">
                <i class="bi bi-envelope-open"></i>
            </div>

            <div>

                <div class="message-detail-label">
                    PESAN MASUK
                </div>

                <h4>
                    {{ $pesan->subjek }}
                </h4>

            </div>

        </div>


        {{-- INFORMASI PENGIRIM --}}
        <div class="message-info-grid">

            {{-- NAMA --}}
            <div class="message-info-item">

                <div class="message-info-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>

                    <span>
                        Nama Pengirim
                    </span>

                    <strong>
                        {{ $pesan->nama }}
                    </strong>

                </div>

            </div>


            {{-- EMAIL --}}
            <div class="message-info-item">

                <div class="message-info-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                <div>

                    <span>
                        Email
                    </span>

                    <strong>
                        {{ $pesan->email }}
                    </strong>

                </div>

            </div>


            {{-- SUBJEK --}}
            <div class="message-info-item">

                <div class="message-info-icon">
                    <i class="bi bi-chat-left-text"></i>
                </div>

                <div>

                    <span>
                        Subjek
                    </span>

                    <strong>
                        {{ $pesan->subjek }}
                    </strong>

                </div>

            </div>


            {{-- TANGGAL --}}
            <div class="message-info-item">

                <div class="message-info-icon">
                    <i class="bi bi-calendar3"></i>
                </div>

                <div>

                    <span>
                        Tanggal
                    </span>

                    <strong>
                        {{ $pesan->created_at->format('d F Y, H:i') }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- ISI PESAN --}}
        <div class="message-content-section">

            <div class="message-content-title">

                <i class="bi bi-chat-left-text"></i>

                Isi Pesan

            </div>


            <div class="message-content-box">

                {{ $pesan->pesan }}

            </div>

        </div>


        {{-- ACTION --}}
        <div class="message-detail-footer">

            <a
                href="mailto:{{ $pesan->email }}?subject={{ rawurlencode('Re: ' . $pesan->subjek) }}"
                class="btn-save-content"
            >
                <i class="bi bi-envelope"></i>
                Balas via Email
            </a>


            <form
                action="{{ route('admin.pesan.destroy', $pesan->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn-delete-content"
                >
                    <i class="bi bi-trash3"></i>
                    Hapus Pesan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection