<?php

namespace App\Http\Controllers;

use App\Models\LaporanData;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {

        $transaksi = LaporanData::all();
        $totalKeseluruhan = $transaksi->sum('total');
        $ppn = $totalKeseluruhan * 0.11; // Pajak PPN 11%
        $totalSetelahPajak = $totalKeseluruhan - $ppn;

        return view('transaksi.index', [
            'transaksi' => $transaksi,
            'totalKeseluruhan' => $totalKeseluruhan,
            'ppn' => $ppn,
            'totalSetelahPajak' => $totalSetelahPajak
        ]);
    }

    public function show($id)
    {
        $transaksi = LaporanData::find($id);
        if ($transaksi) {
            // Misalkan total adalah harga barang * jumlah
            $totalKeseluruhan = $transaksi->total; // Sesuaikan dengan perhitungan yang sesuai
            $ppn = $totalKeseluruhan * 0.11; // Pajak PPN 11%
            $totalSetelahPajak = $totalKeseluruhan - $ppn;

            return response()->json([
                'barang' => $transaksi->barang,
                'jumlah' => $transaksi->jumlah,
                'total' => $transaksi->total,
                'totalKeseluruhan' => $totalKeseluruhan,
                'ppn' => $ppn,
                'totalSetelahPajak' => $totalSetelahPajak,
            ]);
        } else {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }
    }

}
