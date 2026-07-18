@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Jadwal</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Lapangan</label>

                    <select name="court_id" class="form-select">

                        @foreach($courts as $court)

                            <option
                                value="{{ $court->id }}"
                                {{ $court->id == $schedule->court_id ? 'selected' : '' }}>

                                {{ $court->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Tanggal</label>

                    <input
                        type="date"
                        name="date"
                        class="form-control"
                        value="{{ $schedule->date }}">

                </div>

                <div class="mb-3">

                    <label>Jam Mulai</label>

                    <input
                        type="time"
                        name="start_time"
                        class="form-control"
                        value="{{ $schedule->start_time }}">

                </div>

                <div class="mb-3">

                    <label>Jam Selesai</label>

                    <input
                        type="time"
                        name="end_time"
                        class="form-control"
                        value="{{ $schedule->end_time }}">

                </div>

                <div class="mb-4">

                    <label>Status</label>

                    <select name="status" class="form-select">

                        <option value="available"
                            {{ $schedule->status=='available' ? 'selected' : '' }}>

                            Available

                        </option>

                        <option value="booked"
                            {{ $schedule->status=='booked' ? 'selected' : '' }}>

                            Booked

                        </option>

                    </select>

                </div>

                <button class="btn btn-warning">

                    Update Jadwal

                </button>

                <a href="{{ route('admin.schedules.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection