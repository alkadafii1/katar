@extends('layouts.apperance')  

@section('content')
<form action="{{ route('kategoris.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="namaKategori">Nama Kategori</label>
    <input type="text" class="form-control" id="namaKategori" name="namaKategori" required>
</div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection