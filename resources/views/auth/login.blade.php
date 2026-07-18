<x-guest-layout>

    <div class="text-center mb-4">

        <h2 class="fw-bold text-warning">
            Selamat Datang
        </h2>

        <p class="text-muted mb-0">
            Login untuk melanjutkan booking di KisekiCourt
        </p>

    </div>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="mb-3">

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="form-control mt-2"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Masukkan email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

        </div>

        <div class="mb-3">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="form-control mt-2"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember_me"
                    name="remember">

                <label class="form-check-label" for="remember_me">

                    Remember Me

                </label>

            </div>

            @if (Route::has('password.request'))

                <a href="{{ route('password.request') }}"
                   class="text-decoration-none text-warning">

                    Lupa Password?

                </a>

            @endif

        </div>

        <button class="btn btn-warning w-100 fw-bold py-2">

            Login

        </button>

    </form>

    <hr>

    <div class="text-center">

        Belum punya akun?

        <a href="{{ route('register') }}"
           class="text-warning fw-bold text-decoration-none">

            Daftar Sekarang

        </a>

    </div>

</x-guest-layout>