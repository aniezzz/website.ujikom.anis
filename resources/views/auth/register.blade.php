<x-guest-layout>

    <div class="admin-auth-page">

        {{-- PANEL KIRI --}}
        <div class="admin-auth-brand">

            <div class="admin-brand-top">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo SMKN 4 Bogor"
                    class="admin-brand-logo"
                >

                <span>SMKN 4 Bogor</span>
            </div>

            <div class="admin-brand-content">

                <h1>
                    SMKN 4 Bogor
                    <span>Admin Portal</span>
                </h1>

                <p>
                    Kelola informasi dan administrasi
                    website sekolah dalam satu ruang
                    yang terintegrasi.
                </p>

            </div>

            <div class="admin-brand-bottom">

    <div class="admin-security-box">

        <i class="bi bi-shield-check"></i>

        <span>
            Sistem terenkripsi secara end-to-end untuk
            keamanan data institusi.
        </span>

    </div>

    <div class="admin-copyright">
        © 2026 SMK Negeri 4 Bogor. All Rights Reserved.
    </div>

</div>

        </div>


        {{-- FORM REGISTER --}}
        <div class="admin-auth-form">

            <div class="admin-form-header">

                <span class="admin-form-label">
                    ADMINISTRATION
                </span>

                <h2>Buat Akun Admin</h2>

                <p>
                    Lengkapi data di bawah ini untuk
                    membuat akun administrator.
                </p>

            </div>


            <form method="POST" action="{{ route('register') }}">
                @csrf


                {{-- NAMA --}}
                <div class="admin-form-group">

                    <x-input-label
                        for="name"
                        value="Nama Lengkap"
                    />

                    <x-text-input
                        id="name"
                        class="admin-input"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Contoh: Budi Santoso"
                    />

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="admin-input-error"
                    />

                </div>


                {{-- EMAIL --}}
                <div class="admin-form-group">

                    <x-input-label
                        for="email"
                        value="Email"
                    />

                    <x-text-input
                        id="email"
                        class="admin-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="admin@smkn4.sch.id"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="admin-input-error"
                    />

                </div>


                {{-- PASSWORD --}}
                <div class="admin-form-group">

                    <x-input-label
                        for="password"
                        value="Password"
                    />

                    <x-text-input
                        id="password"
                        class="admin-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Masukkan password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="admin-input-error"
                    />

                </div>


                {{-- KONFIRMASI PASSWORD --}}
                <div class="admin-form-group">

                    <x-input-label
                        for="password_confirmation"
                        value="Konfirmasi Password"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="admin-input"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Ulangi password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="admin-input-error"
                    />

                </div>


                {{-- KODE RAHASIA --}}
                <div class="admin-form-group">

                    <x-input-label
                        for="kode_rahasia"
                        value="Kode Rahasia Admin"
                    />

                    <x-text-input
                        id="kode_rahasia"
                        class="admin-input"
                        type="password"
                        name="kode_rahasia"
                        required
                        placeholder="Masukkan kode rahasia"
                    />

                    <x-input-error
                        :messages="$errors->get('kode_rahasia')"
                        class="admin-input-error"
                    />

                </div>


                {{-- TOMBOL --}}
                <div class="admin-form-footer">

                    <button
                        type="submit"
                        class="admin-submit-btn"
                    >
                        <span>Daftar Akun Admin</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>

                    <div class="admin-login-link">

                        <span>Sudah memiliki akun?</span>

                        <a href="{{ route('login') }}">
                            Kembali ke Login
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>