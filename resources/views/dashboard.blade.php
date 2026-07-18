@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Dashboard Admin
        </h2>

        <a href="{{ route('admin.reports.pdf') }}"
           class="btn btn-danger">

            📄 Export Laporan PDF

        </a>

    </div>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-primary shadow">

                <div class="card-body">

                    <h5>Total Lapangan</h5>

                    <h2>{{ $totalCourts }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-success shadow">

                <div class="card-body">

                    <h5>Total Jadwal</h5>

                    <h2>{{ $totalSchedules }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-warning shadow">

                <div class="card-body">

                    <h5>Total Booking</h5>

                    <h2>{{ $totalBookings }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card text-white bg-danger shadow">

                <div class="card-body">

                    <h5>Menunggu Verifikasi</h5>

                    <h2>{{ $pendingPayments }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-2">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">

                    Statistik Pembayaran

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>

                            <th>Approved</th>

                            <td>{{ $approvedPayments }}</td>

                        </tr>

                        <tr>

                            <th>Rejected</th>

                            <td>{{ $rejectedPayments }}</td>

                        </tr>

                        <tr>

                            <th>Pending</th>

                            <td>{{ $pendingPayments }}</td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">

                    Booking Terbaru

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

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

                                <td>{{ $booking->user->name }}</td>

                                <td>{{ $booking->schedule->court->name }}</td>

                                <td>

                                    @if($booking->status == 'approved')

                                        <span class="badge bg-success">

                                            Approved

                                        </span>

                                    @elseif($booking->status == 'pending')

                                        <span class="badge bg-warning text-dark">

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

                                    Belum ada booking

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

@endsection