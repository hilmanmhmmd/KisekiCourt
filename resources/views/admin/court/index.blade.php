@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Lapangan</h3>

        <a href="{{ route('admin.courts.create') }}" class="btn btn-warning">
            + Tambah Lapangan
        </a>
    </div>

    <div class="card shadow">

        <div class="card-body">

        <form method="GET" class="mb-3">

            <div class="row">

                <div class="col-md-4">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        class="form-control"
                        placeholder="Cari lapangan...">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">
                        Cari
                    </button>

                </div>

            </div>

        </form>

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Harga / Jam</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>
                </tr>
                </thead>

                <tbody>

                @forelse($courts as $court)

                    <tr>

                        <td>{{ $courts->firstItem() + $loop->index }}</td>

                        <td>
                            @if($court->image)
                                <img src="{{ asset('storage/'.$court->image) }}"
                                    width="90"
                                    height="60"
                                    style="object-fit:cover;border-radius:8px;">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>

                        <td>{{ $court->name }}</td>

                        <td>{{ $court->type }}</td>

                        <td>
                            Rp {{ number_format($court->price_per_hour,0,',','.') }}
                        </td>

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

                        <td>

                            <a href="{{ route('admin.courts.show',$court) }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('admin.courts.edit',$court) }}"
                               class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.courts.destroy',$court) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus lapangan ini?')"
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            Belum ada data lapangan.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $courts->links() }}

            </div>

        </div>

    </div>

</div>

@endsection