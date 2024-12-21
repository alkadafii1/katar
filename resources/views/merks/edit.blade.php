@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Merk</h2>
    <form action="{{ route('merks.update', $merk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="namaMerk">Nama Merk</label>
            <input type="text" class="form-control" id="namaMerk" name="namaMerk" value="{{ old('namaMerk', $merk->namaMerk) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
