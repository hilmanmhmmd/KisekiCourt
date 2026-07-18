<x-guest-layout>

    <div class="text-center mb-4">

        <h2 class="fw-bold text-warning">
            🏀 Buat Akun Baru
        </h2>

        <p class="text-muted mb-0">
            Daftar sekarang dan mulai booking lapangan favoritmu.
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div class="mb-3">

            <x-input-label for="name" :value="__('Nama Lengkap')" />

            <x-text-input
                id="name"
                class="form-control mt-2"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap" />

            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger"/>

        </div>

        <div class="mb-3">

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="form-control mt-2"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="Masukkan email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"/>

        </div>

        <div class="mb-3">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="form-control mt-2"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Masukkan password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"/>

        </div>

        <div class="mb-4">

            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input
                id="password_confirmation"
                class="form-control mt-2"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger"/>

        </div>

        <button class="btn btn-warning w-100 fw-bold py-2">

            Daftar Sekarang

        </button>

        <hr>

        <div class="text-center">

            Sudah punya akun?

            <a href="{{ route('login') }}"
               class="text-warning fw-bold text-decoration-none">

                Login

            </a>

        </div>

    </form>

</x-guest-layout>