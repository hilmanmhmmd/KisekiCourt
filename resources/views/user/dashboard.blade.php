@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">
        Halo, {{ auth()->user()->name }}
    </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow-sm text-center">

                <div class="card-body">

                    <h5>Total Booking</h5>

                    <h1>{{ $totalBooking }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm text-center">

                <div class="card-body">

                    <h5>Booking Pending</h5>

                    <h1>{{ $pendingBooking }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm text-center">

                <div class="card-body">

                    <h5>Booking Disetujui</h5>

                    <h1>{{ $approvedBooking }}</h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow-sm mt-4">

        <div class="card-body">

            <h4>🏀 Selamat Datang di KisekiCourt</h4>

            <p>
                Silakan pilih jadwal yang tersedia untuk melakukan booking lapangan basket.
            </p>

            <div class="mt-3">

                <a href="{{ route('user.bookings.index') }}"
                    class="btn btn-warning">

                    🏀 Booking Lapangan

                </a>

                <a href="{{ route('user.bookings.history') }}"
                    class="btn btn-outline-dark">

                    📋 Riwayat Booking

                </a>

            </div>

        </div>

    </div>

</div>

@endsection