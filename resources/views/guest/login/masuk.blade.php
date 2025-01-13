@extends('guest.layouts.login')

@section('title', 'Masuk')

@section('content')
    <div class="container">
        <h2>Halaman Masuk</h2>
        
        <form action="{{ route('guest.masuk.submit') }}" method="post">
            @csrf
            <label for="email-masuk">Email:</label>
            <input type="email" id="email-masuk" name="email" required>

            <label for="password-masuk">Password:</label>
            <input type="password" id="password-masuk" name="password" required>

            <button type="submit">Masuk</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('guest.daftar') }}">Daftar</a></p>
    </div>
@endsection
