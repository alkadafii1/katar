<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    // daftar pelanggan
    public function index()
    {
        $pelanggans = pelanggan::all(); 
        return view('pelanggans.index', compact('pelanggans'));
    }

    // form pelanggan baru
    public function create()
    {
        return view('pelanggans.create');
    }

    // Simpan 
    public function store(Request $request)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|numeric|unique:pelanggan,noTlp',
            'email' => 'required|email|unique:pelanggan,email',
            'jumlahPoin' => 'required|integer|min:0',
        ]);

        pelanggan::create($request->all());

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }


    public function show($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggans.show', compact('pelanggan'));
    }

    // Edit
    public function edit($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|numeric|unique:pelanggan,noTlp,' . $id,
            'email' => 'required|email|unique:pelanggan,email,' . $id,
            'jumlahPoin' => 'required|integer|min:0',
        ]);

        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Hapus
    public function destroy($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}

