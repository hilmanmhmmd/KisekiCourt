@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Data Booking
    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>User</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($bookings as $booking)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $booking->user->name }}

                        </td>

                        <td>

                            {{ $booking->schedule->court->name }}

                        </td>

                        <td>

                            {{ $booking->schedule->date }}

                        </td>

                        <td>

                            {{ substr($booking->schedule->start_time,0,5) }}
                            -
                            {{ substr($booking->schedule->end_time,0,5) }}

                        </td>

                        <td>

                            Rp {{ number_format($booking->total_price,0,',','.') }}

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

                        <td>

                            @if($booking->payment)

                                <span class="badge bg-primary">

                                    Sudah Upload

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Belum Upload

                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.bookings.show',$booking) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center">

                            Belum ada booking.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $bookings->links() }}

        </div>

    </div>

</div>

@endsection