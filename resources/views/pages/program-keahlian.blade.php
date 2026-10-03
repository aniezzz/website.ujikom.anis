@extends('layouts.app')

@section('title', 'Program Keahlian - SMK Negeri 4 Kota Bogor')

@section('content')

    {{-- =========================================================
       HEADER
    ========================================================== --}}
    <section class="pk-header text-center">

        <div class="container">

            <div class="pk-header-badge">
                Pusat Keunggulan
            </div>

            <h1 class="fw-bold mb-3" style="font-size: 2rem;">
                Program Keahlian &
                <span class="text-highlight">
                    Kompetensi Masa Depan
                </span>
            </h1>

            <p class="text-muted mx-auto mb-4" style="max-width: 650px;">
                Kami menghadirkan kurikulum berbasis industri yang relevan
                dengan kebutuhan pasar global. Temukan potensi terbaik Anda
                di SMKN 4 Bogor.
            </p>

            <div>

                <span class="pk-stat-item">
                    <i class="bi bi-people-fill"></i>
                    1.200+ Siswa Aktif
                </span>

                <span class="pk-stat-item">
                    <i class="bi bi-briefcase-fill"></i>
                    50+ Mitra Industri
                </span>

                <span class="pk-stat-item">
                    <i class="bi bi-award-fill"></i>
                    Akreditasi A
                </span>

            </div>

        </div>

    </section>


    {{-- =========================================================
       SEMUA PROGRAM KEAHLIAN
    ========================================================== --}}

    @foreach ($programs as $index => $program)

        @php

            $namaProgram = strtolower($program->nama);

            if (
                str_contains($namaProgram, 'pengembangan perangkat lunak') ||
                str_contains($namaProgram, 'pplg')
            ) {

                $anchor = 'pplg';

            } elseif (
                str_contains($namaProgram, 'jaringan') ||
                str_contains($namaProgram, 'tjkt')
            ) {

                $anchor = 'tjkt';

            } elseif (
                str_contains($namaProgram, 'pengelasan')
            ) {

                $anchor = 'pengelasan';

            } elseif (
                str_contains($namaProgram, 'otomotif') ||
                str_contains($namaProgram, 'kendaraan ringan')
            ) {

                $anchor = 'otomotif';

            } else {

                $anchor = 'jurusan-' . $program->id;

            }

        @endphp


        {{-- =====================================================
           DETAIL JURUSAN
        ====================================================== --}}

        <section
            id="{{ $anchor }}"
            class="pk-jurusan-section"
            style="{{ $loop->last ? 'border-bottom: none;' : '' }}"
        >

            <div class="container">

                <div class="row align-items-center g-5">


                    {{-- =================================================
                       FOTO JURUSAN
                    ================================================== --}}

                    <div
                        class="col-lg-6
                        {{ $loop->iteration % 2 == 0 ? 'order-lg-2' : '' }}"
                    >

                        <div class="pk-jurusan-image">

                            <img
                                src="{{ asset('images/' . $program->gambar) }}"
                                alt="{{ $program->nama }}"
                            >

                        </div>

                    </div>


                    {{-- =================================================
                       INFORMASI JURUSAN
                    ================================================== --}}

                    <div
                        class="col-lg-6
                        {{ $loop->iteration % 2 == 0 ? 'order-lg-1' : '' }}"
                    >

                        {{-- KATEGORI --}}

                        <div class="pk-jurusan-tag">
                            {{ $program->kategori }}
                        </div>


                        {{-- NAMA JURUSAN --}}

                        <h2 class="pk-jurusan-title">
                            {{ $program->nama }}
                        </h2>


                        {{-- DESKRIPSI --}}

                        <p class="pk-jurusan-desc">
                            {{ $program->deskripsi }}
                        </p>


                        {{-- =================================================
                           KOMPETENSI & PROSPEK
                        ================================================== --}}

                        <div class="row g-3">


                            {{-- KOMPETENSI --}}

                            <div class="col-sm-6">

                                <div class="pk-info-box">

                                    <div class="pk-info-title">
                                        Kompetensi Utama
                                    </div>

                                    <ul class="pk-info-list">

                                        @foreach ($program->kompetensi as $item)

                                            <li>

                                                <i class="bi bi-check-circle-fill"></i>

                                                {{ $item }}

                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>


                            {{-- PROSPEK KARIR --}}

                            <div class="col-sm-6">

                                <div class="pk-info-box">

                                    <div class="pk-info-title">
                                        Prospek Karir
                                    </div>

                                    <ul class="pk-info-list">

                                        @foreach ($program->prospek_karir as $item)

                                            <li>

                                                <i class="bi bi-arrow-right-circle-fill"></i>

                                                {{ $item }}

                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    @endforeach

@endsection