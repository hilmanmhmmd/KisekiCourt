<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
            🏀 KisekiCourt
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#courts">
                            Lapangan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            Tentang
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            Kontak
                        </a>
                    </li>

                @else

                    @if(auth()->user()->role == 'admin')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.courts.index') }}">
                                Lapangan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.schedules.index') }}">
                                Jadwal
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.index') }}">
                                Booking
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.payments.index') }}">
                                Pembayaran
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.reports.index') }}">
                                Laporan
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.bookings.index') }}">
                                Booking
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.bookings.history') }}">
                                Riwayat
                            </a>
                        </li>

                    @endif

                @endguest

            </ul>

            @guest

                <div class="d-flex ms-3">

                    <a href="{{ route('login') }}"
                       class="btn btn-outline-light me-2">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-warning">

                        Register

                    </a>

                </div>

            @else

                <span class="text-white fw-semibold me-3">

                    👋 {{ auth()->user()->name }}

                </span>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger">

                        Logout

                    </button>

                </form>

            @endguest

        </div>

    </div>

</nav>