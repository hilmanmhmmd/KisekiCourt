@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Tambah Lapangan</h3>

        <a href="{{ route('admin.courts.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi Kesalahan!</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <div class="card shadow">

        <div class="card-body">

            <form action="{{ route('admin.courts.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">Nama Lapangan</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Jenis Lapangan</label>

                    <select
                        name="type"
                        class="form-select"
                        required>

                        <option value="">-- Pilih Jenis --</option>

                        <option value="Indoor">Indoor</option>

                        <option value="Outdoor">Outdoor</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Deskripsi</label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control">{{ old('description') }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">Harga / Jam</label>

                    <input
                        type="number"
                        name="price_per_hour"
                        class="form-control"
                        value="{{ old('price_per_hour') }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Foto Lapangan</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*">

                </div>

                <div class="mb-4">

                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select"
                        required>

                        <option value="available">
                            Available
                        </option>

                        <option value="maintenance">
                            Maintenance
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Simpan Lapangan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection