@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                📊 Laporan Transaksi
            </h2>

            <p class="text-muted mb-0">
                Data seluruh transaksi booking lapangan KisekiCourt.
            </p>
        </div>

        <a href="{{ route('admin.reports.pdf') }}"
            class="btn btn-danger shadow"
            target="_blank">

            📄 Export PDF

        </a>

    </div>

    {{-- Total Pendapatan --}}

    <div class="row mb-4">

        <div class="col-lg-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Pendapatan
                    </h6>

                    <h2 class="fw-bold text-success">

                        Rp {{ number_format($totalIncome,0,',','.') }}

                    </h2>

                    <small class="text-muted">

                        Dari seluruh booking yang disetujui

                    </small>

                </div>

            </div>

        </div>

    </div>

    {{-- Tabel Laporan --}}

    <div class="card border-0 shadow">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                📋 Daftar Transaksi

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th>No</th>

                        <th>User</th>

                        <th>Lapangan</th>

                        <th>Tanggal</th>

                        <th>Total</th>

                        <th>Status Booking</th>

                        <th>Status Pembayaran</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($bookings as $booking)

                    <tr>

                        <td>

                            {{ $bookings->firstItem() + $loop->index }}

                        </td>

                        <td>

                            <strong>

                                {{ $booking->user->name }}

                            </strong>

                        </td>

                        <td>

                            {{ $booking->schedule->court->name }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') }}

                        </td>

                        <td>

                            <span class="fw-bold text-success">

                                Rp {{ number_format($booking->total_price,0,',','.') }}

                            </span>

                        </td>

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

                        <td>

                            @if(optional($booking->payment)->status == 'approved')

                                <span class="badge bg-success">

                                    Approved

                                </span>

                            @elseif(optional($booking->payment)->status == 'pending')

                                <span class="badge bg-warning text-dark">

                                    Pending

                                </span>

                            @elseif(optional($booking->payment)->status == 'rejected')

                                <span class="badge bg-danger">

                                    Rejected

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Belum Bayar

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            Belum ada transaksi.

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $bookings->links() }}

            </div>

        </div>

    </div>

</div>

@endsection