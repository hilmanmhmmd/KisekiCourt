@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Edit Lapangan</h3>

        <a href="{{ route('admin.courts.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>

    </div>

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

        <div class="card-body">

            <form
                action="{{ route('admin.courts.update',$court) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Nama Lapangan</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name',$court->name) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label>Jenis</label>

                    <select
                        name="type"
                        class="form-select">

                        <option
                            value="Indoor"
                            {{ $court->type=='Indoor' ? 'selected':'' }}>
                            Indoor
                        </option>

                        <option
                            value="Outdoor"
                            {{ $court->type=='Outdoor' ? 'selected':'' }}>
                            Outdoor
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control">{{ old('description',$court->description) }}</textarea>

                </div>

                <div class="mb-3">

                    <label>Harga / Jam</label>

                    <input
                        type="number"
                        name="price_per_hour"
                        class="form-control"
                        value="{{ old('price_per_hour',$court->price_per_hour) }}">

                </div>

                <div class="mb-3">

                    <label>Foto Lama</label>
                    <br>

                    @if($court->image)

                        <img
                            src="{{ asset('storage/'.$court->image) }}"
                            width="200"
                            class="rounded shadow">

                    @else

                        <p>Tidak ada foto.</p>

                    @endif

                </div>

                <div class="mb-3">

                    <label>Ganti Foto</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control">

                </div>

                <div class="mb-4">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-select">

                        <option
                            value="available"
                            {{ $court->status=='available' ? 'selected':'' }}>
                            Available
                        </option>

                        <option
                            value="maintenance"
                            {{ $court->status=='maintenance' ? 'selected':'' }}>
                            Maintenance
                        </option>

                    </select>

                </div>

                <button
                    class="btn btn-warning">

                    Update Lapangan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection