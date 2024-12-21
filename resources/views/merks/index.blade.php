@extends('layouts.app')  

@section('title', 'Data Merk') 

@section('content')  
    <div class="container mt-5">
        <h3 class="text-center">Data Merk</h3>
        <a href="{{ route('merks.create') }}" class="btn btn-success mb-3">Tambah Merk</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Merk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merks as $merk)
                <tr>
                    <td>{{ $merk->namaMerk }}</td>
                    <td>
                        <a href="{{ route('merks.edit', $merk->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('merks.destroy', $merk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 
