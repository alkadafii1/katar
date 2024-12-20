<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris')); 
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('kategoris.create'); 
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        // Menyimpan kategori
        Kategori::create([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); 
        // Menampilkan form edit kategori
        return view('kategoris.edit', compact('kategori')); 
    }

    // Menyimpan perubahan kategori
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diubah');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); 
        $kategori->delete(); 

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus');
    }
}
