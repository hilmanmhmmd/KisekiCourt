@extends('layouts.app')

@section('content')

<div class="container py-4">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header">
            <h4>Upload Bukti Pembayaran</h4>
        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="220">Lapangan</th>
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
                        <strong>
                            Rp {{ number_format($booking->total_price,0,',','.') }}
                        </strong>
                    </td>
                </tr>

            </table>

            <hr>

            <form
                action="{{ route('user.payments.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <input
                    type="hidden"
                    name="booking_id"
                    value="{{ $booking->id }}">

                <div class="mb-3">

                    <label class="form-label">

                        Bukti Transfer

                    </label>

                    <input
                        type="file"
                        name="payment_proof"
                        class="form-control"
                        required>

                </div>

                <button class="btn btn-warning">

                    Upload Bukti

                </button>

                <a
                    href="{{ route('user.bookings.history') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection