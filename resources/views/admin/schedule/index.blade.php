@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>📅 Data Jadwal</h3>

        <a href="{{ route('admin.schedules.create') }}" class="btn btn-warning">
            + Tambah Jadwal
        </a>

    </div>

    {{-- Card --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">No</th>

                        <th>Lapangan</th>

                        <th width="140">Tanggal</th>

                        <th width="170">Jam</th>

                        <th width="120">Status</th>

                        <th width="220">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($schedules as $schedule)

                    <tr>

                        <td>
                            {{ $schedules->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $schedule->court->name }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ substr($schedule->start_time,0,5) }}
                            -
                            {{ substr($schedule->end_time,0,5) }}
                        </td>

                        <td>

                            @if($schedule->status == 'available')

                                <span class="badge bg-success">
                                    Available
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Booked
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.schedules.show',$schedule) }}"
                               class="btn btn-info btn-sm">

                                Detail

                            </a>

                            <a href="{{ route('admin.schedules.edit',$schedule) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.schedules.destroy',$schedule) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus jadwal ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada data jadwal.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">
                {{ $schedules->links() }}
            </div>

        </div>

    </div>

</div>

@endsection