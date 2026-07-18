@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">

<h4>Tambah Jadwal</h4>

</div>

<div class="card-body">

<form
action="{{ route('admin.schedules.store') }}"
method="POST">

@csrf

<div class="mb-3">

<label>Lapangan</label>

<select
name="court_id"
class="form-select">

@foreach($courts as $court)

<option value="{{ $court->id }}">

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
class="form-control">

</div>

<div class="mb-3">

<label>Jam Mulai</label>

<input
type="time"
name="start_time"
class="form-control">

</div>

<div class="mb-3">

<label>Jam Selesai</label>

<input
type="time"
name="end_time"
class="form-control">

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="available">

Available

</option>

<option value="booked">

Booked

</option>

</select>

</div>

<button class="btn btn-warning">

Simpan

</button>

<a
href="{{ route('admin.schedules.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

@endsection