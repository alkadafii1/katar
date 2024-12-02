@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Shift</h1>
    <a href="{{ route('shifts.create') }}" class="btn btn-primary mb-3">Tambah Shift</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Staff</th>
                <th>Jam Kerja</th>
                <th>Jam Pulang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $index => $shift)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $shift->staff->namaStaff }}</td>
                <td>{{ $shift->jamKerja }}</td>
                <td>{{ $shift->jamPulang }}</td>
                <td>
                    <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus shift ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
