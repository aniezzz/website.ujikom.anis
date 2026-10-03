<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') - Admin SMKN 4 Bogor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="dash-body">

<div class="dash-wrapper">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="dash-sidebar">

        {{-- LOGO --}}
        <div class="dash-sidebar-brand">

            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo SMKN 4 Bogor"
                 class="dash-logo">

            <div class="dash-brand-info">
                <div class="dash-brand-title">
                    SMKN 4 Bogor
                </div>

                <div class="dash-brand-sub">
                    PANEL ADMIN
                </div>
            </div>

        </div>


        {{-- MENU --}}
        <div class="dash-menu-label">
            MENU UTAMA
        </div>

        <nav class="dash-nav">

            {{-- DASHBOARD --}}
            <a href="/dashboard"
               class="dash-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>

               {{-- LIHAT WEBSITE --}}
                <a href="{{ url('/') }}"
                    class="dash-nav-link"
                    target="_blank">

                  <i class="bi bi-globe2"></i>

                 <span>Lihat Website</span>

                </a>
                
            {{-- BERITA --}}
            <a href="{{ route('admin.berita.index') }}"
               class="dash-nav-link {{ request()->is('dashboard/berita*') ? 'active' : '' }}">

                <i class="bi bi-newspaper"></i>

                <span>Berita</span>

            </a>

            {{-- KARYA SISWA --}}
            <a href="{{ route('admin.karya.index') }}"
               class="dash-nav-link {{ request()->is('dashboard/karya-siswa*') ? 'active' : '' }}">

                <i class="bi bi-tools"></i>

                <span>Karya Siswa</span>

            </a>


            {{-- GALERI --}}
            <a href="{{ route('admin.galeri.index') }}"
               class="dash-nav-link {{ request()->is('dashboard/galeri*') ? 'active' : '' }}">

                <i class="bi bi-images"></i>

                <span>Galeri</span>

            </a>


            {{-- PESAN --}}
            <a href="{{ route('admin.pesan.index') }}"
               class="dash-nav-link {{ request()->is('dashboard/pesan*') ? 'active' : '' }}">

                <i class="bi bi-envelope"></i>

                <span>Pesan Masuk</span>

            </a>

        </nav>


        {{-- BAGIAN BAWAH SIDEBAR --}}
        <div class="dash-sidebar-bottom">

            <div class="dash-help">
                <i class="bi bi-question-circle"></i>
                <span>Bantuan</span>
            </div>


            {{-- LOGOUT --}}
            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="dash-logout-btn">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>



    {{-- ================= MAIN ================= --}}
    <main class="dash-main">

        {{-- HEADER --}}
        <header class="dash-header">

            <div class="dash-header-left">

                <div class="dash-header-label">
                    PANEL KENDALI
                </div>

                <h1>
                    Beranda - SMK Negeri 4 Kota Bogor
                </h1>

            </div>


            <div class="dash-header-right">

                <div class="dash-admin-info">

                    <strong>
                        Admin Website SMKN 4 Bogor
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>


                <div class="dash-admin-avatar">
                    A
                </div>

            </div>

        </header>


        {{-- ISI HALAMAN --}}
        <section class="dash-content">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>