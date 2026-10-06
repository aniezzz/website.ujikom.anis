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


            {{-- BAWAH: disamakan dengan halaman register --}}
            <div class="admin-brand-bottom">

                <div class="admin-security-box">
                    <i class="bi bi-shield-check"></i>
                    <span>Sistem administrasi khusus pengelola website sekolah.</span>
                </div>

                <div class="admin-copyright">
                    &copy; {{ date('Y') }} SMK Negeri 4 Bogor. All Rights Reserved.
                </div>

            </div>

        </div>


        {{-- FORM LOGIN --}}
        <div class="admin-auth-form">

            <div class="admin-form-header">

                <span class="admin-form-label">
                    ADMINISTRATION
                </span>

                <h2>Masuk ke Akun Admin</h2>

                <p>
                    Masuk untuk melanjutkan ke ruang administrasi
                    SMKN 4 Bogor.
                </p>

            </div>


            {{-- SESSION STATUS --}}
            <x-auth-session-status
                class="admin-session-status"
                :status="session('status')"
            />


            <form method="POST" action="{{ route('login') }}">

                @csrf


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
                        autofocus
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
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="admin-input-error"
                    />

                </div>


                {{-- INGAT SAYA & LUPA PASSWORD --}}
                <div class="admin-remember">

                    <label for="remember_me">

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Ingat saya</span>

                    </label>


                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}">
                            Lupa password?
                        </a>

                    @endif

                </div>


                {{-- TOMBOL MASUK --}}
                <div class="admin-form-footer">

                    <button
                        type="submit"
                        class="admin-submit-btn"
                    >

                        <span>Masuk</span>
                        <i class="bi bi-arrow-right"></i>

                    </button>


                    @if (Route::has('register'))

                        <div class="admin-login-link">

                            <span>Belum memiliki akun?</span>

                            <a href="{{ route('register') }}">
                                Buat akun admin
                            </a>

                        </div>

                    @endif

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>