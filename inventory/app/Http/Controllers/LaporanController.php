<?php

namespace App\Http\Controllers;

use App\Models\LaporanData;
use App\Models\LaporanPajak;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {

        $data = LaporanPajak::with('laporandata')->get();
        return view('laporan.index',compact('data'));
    }

    public function create()
    {
        $laporan_pajak = LaporanData::all();
        return view('laporan.create',compact('laporan_pajak'));
    }
    
    public function store(Request $request)
    {   

        $request->validate([
            'nama' => 'required',
            'npwp' => 'required',
            'total' => 'required'
        ]);

        // Generate nomor invoice
        $latestInvoice = LaporanPajak::orderBy('created_at', 'desc')->first();
        $latestNumber = $latestInvoice ? intval(substr($latestInvoice->no_invoice, 3)) : 0;
        $nextNumber = str_pad($latestNumber + 1, 4, '0', STR_PAD_LEFT);
        
        // Generate nomor invoice
        $no_invoice = 'NI-' . $nextNumber;

        // Simpan data ke tabel tbl_pajak
        LaporanPajak::create([
            'nama' => $request->input('nama'),
            'npwp' => $request->input('npwp'),
            'no_invoice' => $no_invoice, // Menggunakan nomor invoice yang telah digenerate
            'total'     => $request->total
        ]);

        return redirect()->route('laporan-pajak.index')->with('success', 'Data Barang created successfully.');
    }

    public function edit($id)
    {
        $laporanPajak = LaporanPajak::findOrFail($id);
        return view('laporan.edit', compact('laporanPajak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npwp' => 'required|string|max:20',
            'total' => 'required|numeric',
            'no_invoice' => 'required|string|max:255'
        ]);

        $laporanPajak = LaporanPajak::findOrFail($id);
        $laporanPajak->update([
            'nama' => $request->input('nama'),
            'npwp' => $request->input('npwp'),
            'total' => $request->input('total'),
            'no_invoice' => $request->input('no_invoice'),
        ]);

        return redirect()->route('laporan-pajak.index')->with('success', 'Laporan updated successfully.');
    }

    public function destroy($id)
    {
        $laporan_pajak = LaporanPajak::FindOrFail($id);
        $laporan_pajak->delete();
        return redirect()->route('laporan-pajak.index')->with('success', 'Laporan deleted successfully.');
    }


}
