@extends('layouts.app')

@section('content')

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>🏀 Booking Lapangan</h3>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($schedules as $schedule)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $schedule->court->name }}</td>

                        <td>{{ $schedule->date }}</td>

                        <td>
                            {{ substr($schedule->start_time,0,5) }}
                            -
                            {{ substr($schedule->end_time,0,5) }}
                        </td>

                        <td>
                            Rp {{ number_format($schedule->court->price_per_hour,0,',','.') }}
                        </td>

                        <td>
                            <span class="badge bg-success">
                                Available
                            </span>
                        </td>

                        <td>

                            <form action="{{ route('user.bookings.store') }}" method="POST">

                                @csrf

                                <input
                                    type="hidden"
                                    name="schedule_id"
                                    value="{{ $schedule->id }}">

                                <button
                                    type="submit"
                                    class="btn btn-warning btn-sm"
                                    onclick="return confirm('Yakin ingin booking jadwal ini?')">

                                    Booking

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada jadwal tersedia.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection