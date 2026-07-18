@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h3 class="mb-4">Data Pembayaran</h3>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Lapangan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($payments as $payment)

                    <tr>

                        <td>{{ $payments->firstItem() + $loop->index }}</td>

                        <td>{{ $payment->booking->user->name }}</td>

                        <td>{{ $payment->booking->schedule->court->name }}</td>

                        <td>
                            Rp {{ number_format($payment->booking->total_price,0,',','.') }}
                        </td>

                        <td>

                            @if($payment->status=='pending')

                                <span class="badge bg-warning">Pending</span>

                            @elseif($payment->status=='approved')

                                <span class="badge bg-success">Approved</span>

                            @else

                                <span class="badge bg-danger">Rejected</span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.payments.show',$payment) }}"
                               class="btn btn-info btn-sm">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada pembayaran.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $payments->links() }}

        </div>

    </div>

</div>

@endsection