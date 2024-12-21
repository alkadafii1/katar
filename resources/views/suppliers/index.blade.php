@extends('layouts.apperance')  

@section('title', 'Data Supplier') 

@section('content')  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Supplier</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-md btn-success mb-3">Tambah Supplier</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Aksi</th> <!-- Kolom Aksi di tengah -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->namaSupplier }}</td>
                                        <td>{{ $supplier->noTlp }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td class="text-center"> <!-- Menambahkan class 'text-center' di sini -->
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($suppliers->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data supplier yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
