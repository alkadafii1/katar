@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="container">
    <h1>Edit Supplier</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="namaSupplier" class="form-label">Nama Supplier</label>
            <input type="text" name="namaSupplier" id="namaSupplier" class="form-control" value="{{ $supplier->namaSupplier }}" required>
        </div>
        <div class="mb-3">
            <label for="noTlp" class="form-label">No Telepon</label>
            <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ $supplier->noTlp }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $supplier->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
