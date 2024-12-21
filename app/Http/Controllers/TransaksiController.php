<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Penukaran;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksi = Transaksi::with(['pelanggan', 'staff'])->get();
        return response()->json($transaksi);
    }

    // Menampilkan detail transaksi tertentu
    public function show($id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'staff', 'penjualan', 'pembelian', 'penukaran'])->find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($transaksi);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'idPelanggan' => 'required|exists:pelanggans,idPelanggan',
            'idStaff' => 'required|exists:staffs,idStaff',
            'jenisTransaksi' => 'required|string',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create([
            'idPelanggan' => $request->idPelanggan,
            'idStaff' => $request->idStaff,
            'jenisTransaksi' => $request->jenisTransaksi,
            'tglTransaksi' => $request->tglTransaksi,
            'totalTransaksi' => $request->totalTransaksi,
        ]);

        return response()->json($transaksi, 201);
    }

    // Memperbarui transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'idPelanggan' => 'exists:pelanggans,idPelanggan',
            'idStaff' => 'exists:staffs,idStaff',
            'jenisTransaksi' => 'string',
            'tglTransaksi' => 'date',
            'totalTransaksi' => 'numeric',
        ]);

        $transaksi->update($request->all());

        return response()->json($transaksi);
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $transaksi->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    // Menambahkan penjualan dalam transaksi
    public function addPenjualan(Request $request, $id)
    {
        $request->validate([
            'idBarang' => 'required|exists:barangs,idBarang',
            'banyakPenjualan' => 'required|integer',
            'tglPenjualan' => 'required|date',
        ]);

        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $penjualan = Penjualan::create([
            'idTransaksi' => $id,
            'idBarang' => $request->idBarang,
            'banyakPenjualan' => $request->banyakPenjualan,
            'tglPenjualan' => $request->tglPenjualan,
        ]);

        return response()->json($penjualan, 201);
    }

    // Menambahkan pembelian dalam transaksi
    public function addPembelian(Request $request, $id)
    {
        $request->validate([
            'idBarang' => 'required|exists:barangs,idBarang',
            'idSupplier' => 'required|exists:suppliers,idSupplier',
            'banyak' => 'required|integer',
            'tglPembelian' => 'required|date',
        ]);

        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $pembelian = Pembelian::create([
            'idTransaksi' => $id,
            'idBarang' => $request->idBarang,
            'idSupplier' => $request->idSupplier,
            'banyak' => $request->banyak,
            'tglPembelian' => $request->tglPembelian,
        ]);

        return response()->json($pembelian, 201);
    }

    // Menambahkan penukaran dalam transaksi
    public function addPenukaran(Request $request, $id)
    {
        $request->validate([
            'idShop' => 'required|exists:shops,idShop',
            'pointUsed' => 'required|integer',
            'tglRedeem' => 'required|date',
        ]);

        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $penukaran = Penukaran::create([
            'idTransaksi' => $id,
            'idShop' => $request->idShop,
            'pointUsed' => $request->pointUsed,
            'tglRedeem' => $request->tglRedeem,
        ]);

        return response()->json($penukaran, 201);
    }
}
