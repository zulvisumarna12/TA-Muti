<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DataBarangMaster extends Controller
{
    public function index()
    {

        $DataBarang = DataBarang::orderBy('created_at', 'desc')->get();
        return view('databarang.index', compact('DataBarang'));
    }

    public function create()
    {
        $jenisBarangs = JenisBarang::all();
        return view('databarang.create',compact('jenisBarangs'));
    }
    
    public function store(Request $request)
    {   

        $kode = 'JB-' . time().'-'.Str::random(5);
        $request->validate([
            'id_jenis' => 'required|exists:tbl_jenis_barang,id_jenis',
            'nama_barang' => 'required',
            'stok'  => 'required',
            'harga' => 'required'
        ]);

        DataBarang::create([
            'id_jenis' => $request->id_jenis,
            'kode'      => $kode,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

            return redirect()->route('data-barang.index')->with('success', 'Data Barang created successfully.');
    }

    public function edit($id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        // dump($laporanData->attributesToArray());

        return view('databarang.edit', compact('DataBarang'));
    }

    public function update(Request $request, $id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        $request->validate([
            'kode' => 'required',
            'nama_barang'=> 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $DataBarang->update([
            'kode' => $request->kode,
            'nama_barang'   => $request->nama_barang,
            'harga'     => $request->harga,
            'stok'      => $request->stok
        ]);

        return redirect()->route('data-barang.index')->with('success', 'Data Barang updated successfully.');
    }

    public function destroy($id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        $DataBarang->delete();
        return redirect()->route('data-barang.index')->with('success', 'Data Barang deleted successfully.');
    }
}
