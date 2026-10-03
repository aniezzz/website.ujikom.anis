<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
            <span class="fw-bold" style="color: var(--color-primary); font-size: 0.95rem;">
             SMK NEGERI 4 KOTA BOGOR
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
           <ul class="navbar-nav mx-auto gap-3">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}" href="{{ url('/') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('profil') ? 'active-menu' : '' }}" href="{{ url('/profil') }}">Profil</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ request()->is('produk*') ? 'active-menu' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Informasi umum
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ url('/produk/program-keahlian') }}">Program Keahlian</a></li>
        <li><a class="dropdown-item" href="{{ url('/produk/karya-siswa') }}">Produk & Karya Siswa</a></li>
       </ul>
       </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('berita') ? 'active-menu' : '' }}" href="{{ url('/berita') }}">Berita</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('galeri') ? 'active-menu' : '' }}" href="{{ url('/galeri') }}">Galeri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('kontak') ? 'active-menu' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
    </li>
</ul>
        <a href="{{ route('login') }}" class="btn btn-primary-custom rounded-pill px-4">Admin</a>        </div>
    </div>
</nav>