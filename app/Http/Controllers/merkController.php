<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    // Menampilkan semua merk
    public function index()
    {
        $merks = Merk::all();
        // Menampilkan merk dalam view
        return view('merks.index', compact('merks')); 
    }

    // Menampilkan form untuk menambah merk
    public function create()
    {
        return view('merks.create'); 
    }

    // Menyimpan merk baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaMerk' => 'required|string|max:255',
        ]);

        // Menyimpan merk
        Merk::create([
            'namaMerk' => $request->namaMerk,
        ]);

        return redirect()->route('merks.index')->with('success', 'merk berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit merk
    public function edit($id)
    {
        // Mencari merk berdasarkan ID
        $merk = Merk::findOrFail($id); 
        // Menampilkan form edit merk
        return view('merks.edit', compact('merk')); 
    }

    // Menyimpan perubahan merk
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaMerk' => 'required|string|max:255',
        ]);

        $merk = Merk::findOrFail($id); 
        $merk ->update([
            'namaMerk' => $request->namaMerk,
        ]);

        return redirect()->route('merks.index')->with('success', 'merk berhasil diubah');
    }

    // Menghapus merk
    public function destroy($id)
    {
        $merk = Merk::findOrFail($id); 
        $merk->delete();

        return redirect()->route('merks.index')->with('success', 'merk berhasil dihapus');
    }
}
