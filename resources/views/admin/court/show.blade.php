@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Detail Lapangan</h3>

        <div>

            <a href="{{ route('admin.courts.edit',$court) }}"
                class="btn btn-warning">

                ✏ Edit

            </a>

            <a href="{{ route('admin.courts.index') }}"
                class="btn btn-secondary">

                ← Kembali

            </a>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <div class="row">

                <div class="col-md-5">

                    @if($court->image)

                        <img
                            src="{{ asset('storage/'.$court->image) }}"
                            class="img-fluid rounded shadow">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=No+Image"
                            class="img-fluid rounded">

                    @endif

                </div>

                <div class="col-md-7">

                    <table class="table">

                        <tr>
                            <th width="180">Nama Lapangan</th>
                            <td>{{ $court->name }}</td>
                        </tr>

                        <tr>
                            <th>Jenis</th>
                            <td>{{ $court->type }}</td>
                        </tr>

                        <tr>
                            <th>Harga / Jam</th>
                            <td>
                                Rp {{ number_format($court->price_per_hour,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>

                            <td>

                                @if($court->status=='available')

                                    <span class="badge bg-success">
                                        Available
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Maintenance
                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>Deskripsi</th>

                            <td>

                                {{ $court->description }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection