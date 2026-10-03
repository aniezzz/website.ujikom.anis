@extends('layouts.app')

@section('title', 'Kontak - SMK Negeri 4 Kota Bogor')

@section('content')

    {{-- HEADER --}}
    <section class="kontak-header">
        <div class="container">
            <h1 class="fw-bold mb-2" style="font-size: 1.8rem;">Hubungi Kami</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 500px;">
                Kami siap membantu Anda. Jangan ragu untuk mengirimkan pertanyaan, saran, atau informasi lainnya mengenai SMKN 4 Bogor melalui saluran di bawah ini.
            </p>
        </div>
    </section>

    <div class="container py-5">

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">

            {{-- FORM KIRIM PESAN --}}
            <div class="col-lg-6">
                <div class="kontak-form-card">

                    <div class="kontak-form-title">
                        Kirim Pesan
                    </div>

                    <form action="{{ url('/kontak') }}" method="POST">
                        @csrf

                        <input
                            type="text"
                            name="nama"
                            class="kontak-form-control"
                            placeholder="Nama Lengkap"
                            value="{{ old('nama') }}"
                            required
                        >

                        <input
                            type="email"
                            name="email"
                            class="kontak-form-control"
                            placeholder="Alamat Email"
                            value="{{ old('email') }}"
                            required
                        >

                        {{-- SUBJEK --}}
                        <select
                            name="subjek"
                            class="kontak-form-control"
                            required
                        >
                            <option value="">Pilih Subjek</option>

                            <option
                                value="Informasi Sekolah"
                                {{ old('subjek') == 'Informasi Sekolah' ? 'selected' : '' }}
                            >
                                Informasi Sekolah
                            </option>

                            <option
                                value="Pendaftaran"
                                {{ old('subjek') == 'Pendaftaran' ? 'selected' : '' }}
                            >
                                Pendaftaran
                            </option>

                            <option
                                value="Program Keahlian"
                                {{ old('subjek') == 'Program Keahlian' ? 'selected' : '' }}
                            >
                                Program Keahlian
                            </option>

                            <option
                                value="Karya & Produk Siswa"
                                {{ old('subjek') == 'Karya & Produk Siswa' ? 'selected' : '' }}
                            >
                                Karya & Produk Siswa
                            </option>

                            <option
                                value="Saran & Masukan"
                                {{ old('subjek') == 'Saran & Masukan' ? 'selected' : '' }}
                            >
                                Saran & Masukan
                            </option>

                            <option
                                value="Lainnya"
                                {{ old('subjek') == 'Lainnya' ? 'selected' : '' }}
                            
                                Lainnya
                            </option>
                        </select>

                        <textarea
                            name="pesan"
                            class="kontak-form-control"
                            rows="4"
                            placeholder="Pesan Anda"
                            required
                        >{{ old('pesan') }}</textarea>

                        <button
                            type="submit"
                            class="btn btn-primary-custom rounded-2 px-4"
                        >
                            Kirim Pesan
                            <i class="bi bi-send"></i>
                        </button>

                    </form>

                </div>
            </div>


            {{-- INFORMASI KONTAK --}}
            <div class="col-lg-6">
                <div class="contact-info-card h-100">

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
                                Jl. Raya Tajur, Kp. Buntar, Kota Bogor, Jawa Barat
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


                    <div class="contact-item mb-0">
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


                    <div class="kontak-social-inline">

                        <span class="kontak-social-label">
                            Terhubung dengan kami
                        </span>

                        <div class="social-icons">

                            <a
                                href="https://www.facebook.com/smknegeri4bogor/"
                                target="_blank"
                            >
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a
                                href="https://www.instagram.com/smkn4kotabogor/"
                                target="_blank"
                            >
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a
                                href="https://www.youtube.com/@smknegeri4bogor905"
                                target="_blank"
                            >
                                <i class="bi bi-youtube"></i>
                            </a>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        {{-- LOKASI SEKOLAH --}}
        <div class="mt-5">

            <h2
                class="fw-bold mb-3"
                style="font-size: 1.3rem;"
            >
                Lokasi Sekolah
            </h2>

            <div class="map-wrapper">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049839558919!2d106.8246939!3d-6.640733399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1788401576838!5m2!1sid!2sid"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin">
                </iframe>

            </div>

        </div>

    </div>

@endsection