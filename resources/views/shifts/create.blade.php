@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Shift</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idstaff" class="form-label">Nama Staff</label>
            <select name="idstaff" id="idstaff" class="form-select" required>
                <option value="">Pilih Staff</option>
                @foreach ($staffs as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->namaStaff }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jamKerja" class="form-label">Jam Kerja</label>
            <input type="time" name="jamKerja" id="jamKerja" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jamPulang" class="form-label">Jam Pulang</label>
            <input type="time" name="jamPulang" id="jamPulang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
