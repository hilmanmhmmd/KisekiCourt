@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Detail Jadwal</h4>

        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="200">Lapangan</th>
                    <td>{{ $schedule->court->name }}</td>
                </tr>

                <tr>
                    <th>Tanggal</th>
                    <td>{{ $schedule->date }}</td>
                </tr>

                <tr>
                    <th>Jam</th>
                    <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($schedule->status) }}</td>
                </tr>

            </table>

            <a href="{{ route('admin.schedules.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection