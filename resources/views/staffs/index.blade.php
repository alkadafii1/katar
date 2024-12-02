@extends('layouts.app')  

@section('title', 'Data Staff') 

@section('content')  
    <div class="container mt-5">
        <h3 class="text-center">Data Staff</h3>
        <a href="{{ route('staffs.create') }}" class="btn btn-success mb-3">Tambah Staff</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Staff</th>
                    <th>Sebagai</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->namaStaff }}</td>
                    <td>{{ $staff->sebagai }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->noTlp }}</td>
                    <td>
                        <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display:inline;">
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
