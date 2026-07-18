@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Detail Booking
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="250">Nama User</th>
                    <td>{{ $booking->user->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $booking->user->email }}</td>
                </tr>

                <tr>
                    <th>Lapangan</th>
                    <td>{{ $booking->schedule->court->name }}</td>
                </tr>

                <tr>
                    <th>Tanggal Main</th>
                    <td>{{ $booking->schedule->date }}</td>
                </tr>

                <tr>
                    <th>Jam</th>
                    <td>
                        {{ substr($booking->schedule->start_time,0,5) }}
                        -
                        {{ substr($booking->schedule->end_time,0,5) }}
                    </td>
                </tr>

                <tr>
                    <th>Total Bayar</th>
                    <td>
                        Rp {{ number_format($booking->total_price,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Status Booking</th>
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

                <tr>
                    <th>Bukti Pembayaran</th>
                    <td>

                        @if($booking->payment)

                            <img
                                src="{{ asset('storage/'.$booking->payment->payment_proof) }}"
                                width="350"
                                class="img-thumbnail">

                        @else

                            <span class="badge bg-secondary">
                                Belum Upload
                            </span>

                        @endif

                    </td>
                </tr>

            </table>

            <a href="{{ route('admin.bookings.index') }}"
                class="btn btn-secondary">

                ← Kembali

            </a>

        </div>

    </div>

</div>

@endsection