<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opname;

class OpnameController extends Controller
{
    // Menampilkan daftar opname
    public function index()
    {
        $opnames = Opname::with(['barang', 'staff'])->get();
        return response()->json($opnames);
    }

    // Menampilkan detail opname tertentu
    public function show($id)
    {
        $opname = Opname::with(['barang', 'staff'])->find($id);

        if (!$opname) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($opname);
    }

    // Menambahkan data opname baru
    public function store(Request $request)
    {
        $request->validate([
            'idBarang' => 'required|exists:barangs,idBarang',
            'idStaff' => 'required|exists:staffs,idStaff',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|integer',
            'stokSistem' => 'required|integer'
        ]);

        $selisih = $request->stokFisik - $request->stokSistem;

        $opname = Opname::create([
            'idBarang' => $request->idBarang,
            'idStaff' => $request->idStaff,
            'tglOpname' => $request->tglOpname,
            'stokFisik' => $request->stokFisik,
            'stokSistem' => $request->stokSistem,
            'selisih' => $selisih
        ]);

        return response()->json($opname, 201);
    }

    // Memperbarui data opname
    public function update(Request $request, $id)
    {
        $opname = Opname::find($id);

        if (!$opname) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'idBarang' => 'exists:barangs,idBarang',
            'idStaff' => 'exists:staffs,idStaff',
            'tglOpname' => 'date',
            'stokFisik' => 'integer',
            'stokSistem' => 'integer'
        ]);

        if ($request->has('stokFisik') && $request->has('stokSistem')) {
            $request['selisih'] = $request->stokFisik - $request->stokSistem;
        }

        $opname->update($request->all());

        return response()->json($opname);
    }

    // Menghapus data opname
    public function destroy($id)
    {
        $opname = Opname::find($id);

        if (!$opname) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $opname->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
