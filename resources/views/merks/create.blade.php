@extends('layouts.app')

@section('content')
<form action="{{ route('merks.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="namaMerk">Nama Merk</label>
    <input type="text" class="form-control" id="namaMerk" name="namaMerk" required>
</div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection