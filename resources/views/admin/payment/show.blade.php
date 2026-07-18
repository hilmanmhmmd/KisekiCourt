@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Detail Pembayaran</h4>

        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="220">Nama User</th>
                    <td>{{ $payment->booking->user->name }}</td>
                </tr>

                <tr>
                    <th>Lapangan</th>
                    <td>{{ $payment->booking->schedule->court->name }}</td>
                </tr>

                <tr>
                    <th>Tanggal Main</th>
                    <td>{{ $payment->booking->schedule->date }}</td>
                </tr>

                <tr>
                    <th>Total</th>
                    <td>
                        Rp {{ number_format($payment->booking->total_price,0,',','.') }}
                    </td>
                </tr>

            </table>

            <hr>

            <h5>Bukti Pembayaran</h5>

            <img
                src="{{ asset('storage/'.$payment->payment_proof) }}"
                class="img-fluid rounded border"
                style="max-width:500px;">

            <hr>

            @if($payment->status=='pending')

            <form
                action="{{ route('admin.payments.update',$payment) }}"
                method="POST">

                @csrf
                @method('PUT')

                <button
                    name="status"
                    value="approved"
                    class="btn btn-success">

                    Approve

                </button>

                <button
                    name="status"
                    value="rejected"
                    class="btn btn-danger">

                    Reject

                </button>

            </form>

            @else

                <div class="alert alert-info">

                    Pembayaran sudah diproses.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection