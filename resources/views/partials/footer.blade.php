<footer class="text-white pt-5 pb-3" style="background-color: var(--color-primary-dark);">
    <div class="container">
        <div class="row gy-4">

            {{-- Kolom Kiri: Nama Sekolah + Tagline + Social Media --}}
            <div class="col-lg-4">
                <h5 class="fw-bold mb-2" style="color: var(--color-accent);">SMK Negeri 4 Bogor</h5>
                <p class="small mb-3" style="color: #D6E3FF;">
                    Pusat Keunggulan Pendidikan Vokasi yang mencetak tenaga profesional berstandar global.
                </p>
                <div class="d-flex gap-2">
                <a href="https://www.facebook.com/smknegeri4bogor/" target="_blank" class="btn btn-sm btn-light rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">                <i class="bi bi-facebook" style="color: var(--color-primary-dark);"></i>
                </a>
                <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" class="btn btn-sm btn-light rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                <i class="bi bi-instagram" style="color: var(--color-primary-dark);"></i>
                </a>
                <a href="https://www.youtube.com/@smknegeri4bogor905" target="_blank" class="btn btn-sm btn-light rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                <i class="bi bi-youtube" style="color: var(--color-primary-dark);"></i>
                </a>
                </div>
            </div>

            {{-- Kolom Menu Utama --}}
            <div class="col-lg-3 col-6">
                <h6 class="fw-bold mb-3">Menu Utama</h6>
                <ul class="list-unstyled small">
                <li class="mb-2"><a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="mb-2"><a href="{{ url('/profil') }}" class="text-white text-decoration-none">Profil</a></li>
                <li class="mb-2"><a href="{{ url('/berita') }}" class="text-white text-decoration-none">Berita</a></li>
                <li class="mb-2"><a href="{{ url('/galeri') }}" class="text-white text-decoration-none">Galeri</a></li>
                <li class="mb-2"><a href="{{ url('/kontak') }}" class="text-white text-decoration-none">Kontak</a></li>
               </ul>
            </div>

            {{-- Kolom Informasi --}}
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3">Informasi</h6>
                 <ul class="list-unstyled small">
                 <li class="mb-2"><a href="{{ url('/produk/program-keahlian') }}" class="text-white text-decoration-none">Program Keahlian</a></li>
                 <li class="mb-2"><a href="{{ url('/produk/layanan-fasilitas') }}" class="text-white text-decoration-none">Layanan & Fasilitas</a></li>
                 <li class="mb-2"><a href="{{ url('/produk/karya-siswa') }}" class="text-white text-decoration-none">Karya Siswa</a></li>
                 </ul>
            </div>

            {{-- Kolom Hubungi Kami --}}
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>info@smkn4bogor.sch.id
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone me-2"></i>Telp: (0251) 1234567
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">

    <div class="container text-center">
        <p class="mb-0 small">&copy; 2026 SMK Negeri 4 Bogor. All Rights Reserved.</p>
    </div>
</footer>