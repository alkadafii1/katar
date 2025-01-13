<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Method untuk menampilkan form Daftar
    public function Daftar()
    {
        return view('guest.login.daftar');
    }

    // Method untuk menampilkan form Masuk
    public function Masuk()
    {
        return view('guest.login.masuk');
    }

    // Method untuk menangani submit form Daftar
    public function submitDaftar(Request $request)
    {
        // Validasi dan proses pendaftaran
        return redirect()->route('guest.masuk'); // Redirect ke halaman login setelah berhasil daftar
    }

    // Method untuk menangani submit form Masuk
    public function submitMasuk(Request $request)
    {
        // Validasi dan proses login
        return redirect()->route('guest.index'); // Redirect ke halaman dashboard setelah berhasil login
    }
}
