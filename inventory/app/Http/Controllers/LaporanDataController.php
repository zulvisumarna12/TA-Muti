<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\LaporanData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class LaporanDataController extends Controller
{
    public function index()
    {
        $laporanDatas = LaporanData::orderBy('created_at', 'desc')->get();
        $laporanDatas = LaporanData::all();
        $totalHarga = $laporanDatas->sum('total');
        return view('laporan-data.index', compact('laporanDatas','laporanDatas', 'totalHarga'));
    }

    public function create()
    {
        $barang = DataBarang::all();
        return view('laporan-data.create',['barangs' => $barang]);
    }
    
    public function store(Request $request)
    {   
        // dd($request);
        $request->validate([
            'id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Mengambil data barang
        $barang = DataBarang::find($request->id);
        $total_harga = $barang->harga * $request->jumlah;

        // Simpan transaksi
        LaporanData::create([
            'pajak_id'  => $request->pajak_id,
            'barang' => $request->nama_barang, // Sesuaikan dengan kolom yang ada
            'kode' => $request->kode,
            'jumlah' => $request->jumlah,
            'modal' => $request->harga,
            'total' => $total_harga,
        ]);

        return redirect()->route('laporan-penjualan.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function edit($id)
    {
        $laporanData = LaporanData::FindOrFail($id);
        // dump($laporanData->attributesToArray());
        return view('laporan-data.edit', compact('laporanData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang' => 'required',
            'kode'  => 'required',
            'jumlah' => 'required',
            'modal'  => 'required',
        ]);

        $laporanData = LaporanData::findOrFail($id);

        // Hitung total harga
        $total_harga = $request->modal * $request->jumlah;

        try {
            $laporanData->update([
                'barang' => $request->barang,
                'kode'  => $request->kode,
                'jumlah'  => $request->jumlah,
                'modal'     => $request->modal,
                'total' => $total_harga
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating LaporanData: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Update gagal!');
        }

        return redirect()->route('laporan-penjualan.index')->with('success', 'Laporan updated successfully.');
    }

    public function destroy($id)
    {
        $laporanData = LaporanData::FindOrFail($id);
        $laporanData->delete();
        return redirect()->route('laporan-penjualan.index')->with('success', 'Laporan deleted successfully.');
    }
}
