@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-dark text-white py-5">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h1 class="display-4 fw-bold">
                    Booking Lapangan Basket Online
                </h1>

                <p class="lead mt-3">
                    Selamat datang di <strong>KisekiCourt</strong>.
                    Booking lapangan basket kini lebih mudah, cepat, dan praktis
                    tanpa harus datang langsung ke lokasi.
                </p>

                @guest

                    <a href="{{ route('login') }}" class="btn btn-warning btn-lg mt-3">
                        Booking Sekarang
                    </a>

                @else

                    @if(auth()->user()->role == 'admin')

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-lg mt-3">
                            Dashboard Admin
                        </a>

                    @else

                        <a href="{{ route('user.bookings.index') }}" class="btn btn-warning btn-lg mt-3">
                            Booking Sekarang
                        </a>

                    @endif

                @endguest

                <a href="#courts" class="btn btn-outline-light btn-lg mt-3 ms-2">
                    Lihat Lapangan
                </a>

            </div>

            <div class="col-lg-6 text-center mt-4 mt-lg-0">

                <img
                    src="https://images.unsplash.com/photo-1546519638-68e109498ffc?w=900"
                    class="img-fluid rounded shadow"
                    alt="Basket Court">

            </div>

        </div>

    </div>
</section>

<!-- FITUR -->
<section id="about" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Mengapa Memilih KisekiCourt?
            </h2>

            <p class="text-muted">
                Kami menyediakan pengalaman booking lapangan yang mudah dan nyaman.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <div class="card h-100 shadow-sm border-0 text-center">

                    <div class="card-body">

                        <div class="display-4 mb-3">🏀</div>

                        <h5>Lapangan Berkualitas</h5>

                        <p class="text-muted">
                            Lapangan bersih, nyaman, dan terawat.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card h-100 shadow-sm border-0 text-center">

                    <div class="card-body">

                        <div class="display-4 mb-3">📅</div>

                        <h5>Jadwal Fleksibel</h5>

                        <p class="text-muted">
                            Pilih jadwal sesuai kebutuhan Anda.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card h-100 shadow-sm border-0 text-center">

                    <div class="card-body">

                        <div class="display-4 mb-3">💳</div>

                        <h5>Pembayaran Mudah</h5>

                        <p class="text-muted">
                            Upload bukti pembayaran secara online.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card h-100 shadow-sm border-0 text-center">

                    <div class="card-body">

                        <div class="display-4 mb-3">⚡</div>

                        <h5>Booking Cepat</h5>

                        <p class="text-muted">
                            Booking hanya dalam beberapa klik.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- DAFTAR LAPANGAN -->
<section id="courts" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Daftar Lapangan
            </h2>

            <p class="text-muted">
                Pilih lapangan favoritmu.
            </p>

        </div>

        <div class="row">

            @forelse($courts as $court)

                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100 border-0">

                        @if($court->image)

                            <img
                                src="{{ asset('storage/'.$court->image) }}"
                                class="card-img-top"
                                style="height:230px; object-fit:cover;">

                        @else

                            <img
                                src="https://via.placeholder.com/600x400?text=Lapangan+Basket"
                                class="card-img-top">

                        @endif

                        <div class="card-body">

                            <h4>{{ $court->name }}</h4>

                            <p class="text-muted">

                                📍 {{ $court->location }}

                            </p>

                            <h5 class="text-success">

                                Rp {{ number_format($court->price_per_hour,0,',','.') }}/Jam

                            </h5>

                        </div>

                        <div class="card-footer bg-white border-0">

                            @guest

                                <a href="{{ route('login') }}"
                                   class="btn btn-warning w-100">

                                    Login untuk Booking

                                </a>

                            @else

                                @if(auth()->user()->role == 'user')

                                    <a href="{{ route('user.bookings.index') }}"
                                       class="btn btn-warning w-100">

                                        Booking Sekarang

                                    </a>

                                @else

                                    <a href="{{ route('admin.courts.index') }}"
                                       class="btn btn-secondary w-100">

                                        Kelola Lapangan

                                    </a>

                                @endif

                            @endguest

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        Belum ada lapangan yang tersedia.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<section id="contact" class="py-5 bg-dark text-white">

    <div class="container text-center">

        <h2>Hubungi Kami</h2>

        <p class="mt-3">

            📍 Banjarbaru, Kalimantan Selatan

        </p>

        <p>

            📞 0812-3456-7890

        </p>

        <p>

            ✉ kisekicourt@gmail.com

        </p>

    </div>

</section>

@endsection