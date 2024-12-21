<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Staff;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Menampilkan daftar shift
    public function index()
    {
        // Mengambil shift dengan relasi staff
        $shifts = Shift::with('staff')->get(); 
        return view('shifts.index', compact('shifts'));
    }

    // Menampilkan form untuk menambahkan shift baru
    public function create()
    {
        // Mengambil daftar staff
        $staffs = Staff::all(); 
        return view('shifts.create', compact('staffs'));
    }

    // Menyimpan shift yang baru dibuat
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
        ]);

        // Menyimpan data shift
        Shift::create($request->all());

        // Redirect setelah berhasil menambahkan shift
        return redirect()->route('shifts.index')->with('success', 'Shift berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit shift
    public function edit($id)
    {
        // Mencari shift berdasarkan ID dan menampilkan form edit
        $shift = Shift::findOrFail($id); 
        $staffs = Staff::all(); 
        return view('shifts.edit', compact('shift', 'staffs'));
    }

    // Mengupdate shift yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
        ]);

        // Mencari shift yang ingin diupdate
        $shift = Shift::findOrFail($id);
        $shift->update($request->all());

        // Redirect setelah berhasil mengupdate shift
        return redirect()->route('shifts.index')->with('success', 'Shift berhasil diubah');
    }

    // Menghapus shift
    public function destroy($id)
    {
        // Mencari shift berdasarkan ID dan menghapusnya
        $shift = Shift::findOrFail($id);
        $shift->delete();

        // Redirect setelah berhasil menghapus shift
        return redirect()->route('shifts.index')->with('success', 'Shift berhasil dihapus');
    }
}
