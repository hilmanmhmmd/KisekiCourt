@extends('layouts.app')

@section('content')

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h3 class="mb-4">📋 Riwayat Booking</h3>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Lapangan</th>
                        <th>Tanggal Main</th>
                        <th>Jam</th>
                        <th>Total</th>
                        <th>Status Booking</th>
                        <th width="220">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($bookings as $booking)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $booking->schedule->court->name }}</td>

                    <td>{{ $booking->schedule->date }}</td>

                    <td>
                        {{ substr($booking->schedule->start_time,0,5) }}
                        -
                        {{ substr($booking->schedule->end_time,0,5) }}
                    </td>

                    <td>
                        Rp {{ number_format($booking->total_price,0,',','.') }}
                    </td>

                    <td>

                        @if($booking->status == 'pending')

                            <span class="badge bg-warning">
                                Pending
                            </span>

                        @elseif($booking->status == 'approved')

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($booking->payment)

                            <a href="{{ route('user.payments.show', $booking->payment->id) }}"
                               class="btn btn-success btn-sm">

                                Lihat Bukti

                            </a>

                        @else

                            <a href="{{ route('user.payments.create', $booking->id) }}"
                               class="btn btn-warning btn-sm">

                                Upload Bukti

                            </a>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada booking.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection