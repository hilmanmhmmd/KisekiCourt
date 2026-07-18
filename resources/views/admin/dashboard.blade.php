@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Dashboard Admin
    </h2>

    <!-- Statistik -->
    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h6>Total User</h6>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Lapangan</h6>
                    <h2>{{ $totalCourts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h6>Total Jadwal</h6>
                    <h2>{{ $totalSchedules }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Booking</h6>
                    <h2>{{ $totalBookings }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Statistik Tambahan -->

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <h5>Total Pendapatan</h5>

                    <h3 class="text-success">

                        Rp {{ number_format($totalRevenue,0,',','.') }}

                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <h5>Booking Pending</h5>

                    <h3 class="text-warning">

                        {{ $pendingBookings }}

                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <h5>Pembayaran Pending</h5>

                    <h3 class="text-danger">

                        {{ $pendingPayments }}

                    </h3>

                </div>
            </div>
        </div>

    </div>

    <!-- Grafik -->

    <div class="card shadow mb-4">

        <div class="card-header bg-dark text-white">

            Statistik Booking per Bulan

        </div>

        <div class="card-body">

            <canvas id="bookingChart" height="100"></canvas>

        </div>

    </div>

    <!-- Tabel -->

    <div class="row">

        <!-- Booking -->

        <div class="col-lg-6 mb-4">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    Booking Terbaru

                </div>

                <div class="card-body">

                    <table class="table table-hover">

                        <thead>

                        <tr>

                            <th>User</th>

                            <th>Lapangan</th>

                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse($latestBookings as $booking)

                            <tr>

                                <td>

                                    {{ $booking->user->name }}

                                </td>

                                <td>

                                    {{ $booking->schedule->court->name }}

                                </td>

                                <td>

                                    @if($booking->status=='approved')

                                        <span class="badge bg-success">

                                            Approved

                                        </span>

                                    @elseif($booking->status=='pending')

                                        <span class="badge bg-warning">

                                            Pending

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Rejected

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center">

                                    Belum ada booking.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- Pembayaran -->

        <div class="col-lg-6 mb-4">

            <div class="card shadow">

                <div class="card-header bg-danger text-white">

                    Pembayaran Pending

                </div>

                <div class="card-body">

                    <table class="table table-hover">

                        <thead>

                        <tr>

                            <th>User</th>

                            <th>Lapangan</th>

                            <th>Aksi</th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse($pendingPaymentList as $payment)

                            <tr>

                                <td>

                                    {{ $payment->booking->user->name }}

                                </td>

                                <td>

                                    {{ $payment->booking->schedule->court->name }}

                                </td>

                                <td>

                                    <a href="{{ route('admin.payments.show',$payment) }}"
                                        class="btn btn-primary btn-sm">

                                        Lihat

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center">

                                    Tidak ada pembayaran pending.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('bookingChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: @json($chartLabels),

        datasets: [{

            label: 'Jumlah Booking',

            data: @json($chartData),

            backgroundColor: [
                '#0d6efd',
                '#198754',
                '#ffc107',
                '#dc3545',
                '#6610f2',
                '#20c997',
                '#fd7e14',
                '#6f42c1',
                '#0dcaf0',
                '#6c757d',
                '#212529',
                '#198754'
            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false

            }

        },

        scales: {

            y: {

                beginAtZero: true,

                ticks: {

                    precision: 0

                }

            }

        }

    }

});

</script>

@endsection