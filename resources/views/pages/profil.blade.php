@extends('layouts.app')

@section('title', 'Profil - SMK Negeri 4 Kota Bogor')

@section('content')

      {{-- PAGE HEADER --}}
       <section class="page-header-photo" style="background-image: url('{{ asset('images/header-profil.jpg') }}');">
    <div class="page-header-overlay"></div>

</section>
{{-- TENTANG SEKOLAH SECTION --}}
<section class="profil-about-section py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- FOTO SEKOLAH --}}
            <div class="col-lg-6">

                <div class="profil-about-visual">

    {{-- FOTO UTAMA --}}
    <div class="profil-about-main-image">
        <img
            src="{{ asset('images/hero-sekolah.jpg') }}"
            alt="SMK Negeri 4 Kota Bogor"
        >
    </div>

    {{-- KARTU AKREDITASI --}}
    <div class="profil-about-accreditation">

        <div class="profil-small-icon">
            <i class="bi bi-award"></i>
        </div>

        <div>
            <span>AKREDITASI</span>
            <strong>A</strong>
        </div>

    </div>

    {{-- KARTU TAHUN --}}
    <div class="profil-about-year">

        <strong>20+</strong>

        <span>
            Tahun pengabdian<br>
            dalam pendidikan
        </span>

    </div>

    {{-- FOTO KEGIATAN --}}
    <div class="profil-about-secondary-image">

        <img
            src="{{ asset('images/program-rpl.jpg') }}"
            alt="Kegiatan siswa SMK Negeri 4 Kota Bogor"
        >

    </div>

</div>

            </div>


            {{-- INFORMASI --}}
            <div class="col-lg-6">

                <div class="profil-about-content">

                    <div class="profil-about-label">
                        Tentang Sekolah
                    </div>

                    <h2>
                        Mengenal Lebih Dekat
                        <span>SMK Negeri 4 Kota Bogor</span>
                    </h2>

                    <p>
                        SMK Negeri 4 Kota Bogor merupakan sekolah kejuruan
                        yang berkomitmen memberikan pendidikan berbasis
                        kompetensi serta membekali peserta didik dengan
                        keterampilan yang sesuai dengan perkembangan dunia kerja.
                    </p>

                    <p>
                        SMK Negeri 4 Bogor terus berkembang dalam mengintegrasikan
                        pendidikan berbasis kompetensi dengan pengembangan
                        karakter peserta didik. Kami mendorong setiap siswa
                        untuk mengembangkan potensi, kreativitas, serta
                        keterampilan yang dimiliki.
                    </p>

                    <div class="profil-about-points">

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pendidikan berbasis kompetensi</span>
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pengembangan potensi dan kreativitas siswa</span>
                        </div>

                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pembentukan karakter peserta didik</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
  
           {{-- SEJARAH SECTION --}}
    <section class="py-5" style="background-color: var(--color-bg-soft);">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h2 class="fw-bold mb-3" style="font-size: 1.6rem;">Jejak Langkah & Sejarah</h2>
                    <p class="mb-4" style="color: var(--color-text);">
                        Berawal dari semangat untuk memajukan pendidikan kejuruan di Bogor, SMK Negeri 4 telah bertransformasi menjadi salah satu institusi terdepan.
                    </p>
                    <div class="sejarah-stat-box">
                        <div class="sejarah-stat-number">20+</div>
                        <div class="sejarah-stat-label">Tahun berdedikasi mencetak tenaga kerja profesional</div>
                    </div>
                    {{-- Ganti "20+" dan teks di atas sesuai data asli tahun berdirinya sekolah --}}
                </div>
                <div class="col-lg-8">
                    <div class="timeline-wrap">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card">
                                <div class="timeline-year">Pendirian</div>
                                <p class="timeline-desc">Sekolah ini didirikan sebagai respon atas meningkatnya kebutuhan tenaga kerja terampil di wilayah industri Jawa Barat, khususnya Kota Bogor.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card">
                                <div class="timeline-year">Ekspansi Jurusan</div>
                                <p class="timeline-desc">Penambahan program keahlian baru guna menjawab tantangan revolusi digital dan kebutuhan industri di Indonesia.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card">
                                <div class="timeline-year">SMK Pusat Keunggulan</div>
                                <p class="timeline-desc">Ditetapkan sebagai SMK Pusat Keunggulan (Center of Excellence) yang menjadi rujukan bagi sekolah lainnya.</p>
                            </div>
                        </div>
                    </div>
                    {{-- Ganti tahun dan deskripsi tiap timeline sesuai sejarah asli sekolah --}}
                </div>
            </div>
        </div>
    </section>

    {{-- VISI MISI SECTION --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2" style="font-size: 1.6rem;">Visi & Misi</h2>
                <p class="text-muted mb-0">Arah dan tujuan yang menjadi pedoman kami dalam mendidik generasi masa depan</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="visi-card-colored">
                        <div class="visi-icon-box">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Visi Sekolah</h5>
                        <p class="visi-quote">
                            "Terwujudnya SMK Negeri 4 Kota Bogor sebagai pusat pendidikan dan pelatihan vokasi yang unggul, berkarakter, dan berdaya saing di tingkat nasional maupun internasional."
                        </p>
                    </div>
                    {{-- Ganti isi Visi di atas dengan data resmi dari sekolah --}}
                </div>
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="misi-card">
                                <div class="misi-icon-box"><i class="bi bi-mortarboard-fill"></i></div>
                                <div class="misi-title">Pendidikan Berkualitas</div>
                                <p class="misi-desc">Menyelenggarakan proses pembelajaran berbasis kompetensi sesuai standar industri.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="misi-card">
                                <div class="misi-icon-box"><i class="bi bi-people-fill"></i></div>
                                <div class="misi-title">Pembangunan Karakter</div>
                                <p class="misi-desc">Menanamkan nilai-nilai moral, etika, dan integritas kepada setiap peserta didik.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="misi-card">
                                <div class="misi-icon-box"><i class="bi bi-briefcase-fill"></i></div>
                                <div class="misi-title">Kemitraan Industri</div>
                                <p class="misi-desc">Memperkuat kerja sama strategis dengan dunia usaha dan industri global.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="misi-card">
                                <div class="misi-icon-box"><i class="bi bi-lightbulb-fill"></i></div>
                                <div class="misi-title">Inovasi Teknologi</div>
                                <p class="misi-desc">Mendorong kreativitas dan inovasi di bidang teknologi terapan.</p>
                            </div>
                        </div>
                    </div>
                    {{-- Ganti isi ke-4 Misi di atas dengan data resmi dari sekolah --}}
                </div>
            </div>
        </div>
    </section>

    {{-- STRUKTUR ORGANISASI SECTION --}}
    <section class="py-5" style="background-color: var(--color-bg-soft);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-0" style="font-size: 1.6rem;">Struktur Organisasi</h2>
            </div>

            <div class="org-tree">
                {{-- Kepala Sekolah --}}
                <div class="org-top-wrap">
                    <div class="org-node org-node-top">
                        <div class="org-photo">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="org-name">Drs. Mulya Murpihartono, M.Si</div>
                        <div class="org-role">Kepala Sekolah</div>
                    </div>
                </div>

                {{-- Wakil Kepala Sekolah --}}
                <div class="org-branch">
                    <div class="org-child">
                        <div class="org-node">
                            <div class="org-name">Wakasek Kurikulum</div>
                            <div class="org-role-muted">Staf Manajemen</div>
                        </div>
                    </div>
                    <div class="org-child">
                        <div class="org-node">
                            <div class="org-name">Wakasek Kesiswaan</div>
                            <div class="org-role-muted">Staf Manajemen</div>
                        </div>
                    </div>
                    <div class="org-child">
                        <div class="org-node">
                            <div class="org-name">Wakasek Hubungan Industri</div>
                            <div class="org-role-muted">Staf Manajemen</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Ganti "Drs. Nama Kepala Sekolah" dan nama-nama Wakasek dengan data asli dari sekolah --}}
        </div>
    </section>

@endsection

@section('scripts')
<script>
    function putarVideo(frameId, driveId) {
        const frame = document.getElementById(frameId);
        frame.innerHTML = `<iframe src="https://drive.google.com/file/d/${driveId}/preview" allow="autoplay" allowfullscreen style="width:100%; height:100%; border:0;"></iframe>`;
    }
</script>
@endsection