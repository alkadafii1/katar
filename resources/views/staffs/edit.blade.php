@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Staff</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="namaStaff" class="form-label">Nama Staff</label>
            <input type="text" name="namaStaff" id="namaStaff" class="form-control" value="{{ $staff->namaStaff }}" required>
        </div>
        <div class="mb-3">
            <label for="sebagai" class="form-label">Sebagai</label>
            <input type="text" name="sebagai" id="sebagai" class="form-control" value="{{ $staff->sebagai }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $staff->email }}" required>
        </div>
        <div class="mb-3">
            <label for="noTlp" class="form-label">No Telepon</label>
            <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ $staff->noTlp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection