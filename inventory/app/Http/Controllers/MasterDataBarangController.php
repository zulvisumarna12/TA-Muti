<?php

use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class MasterDataBarangController extends Controller
{
    // public function index()
    // {
    //     $DataBarang = DataBarang::all();
    //     return view('data-barang.index', compact('DataBarang'));
    // }

    // public function create()
    // {
    //     return view('data-barang.create');
    // }
    
    public function store(Request $request)
    {   
        $kode = 'JB-' . time().'-'.Str::random(5);
        $request->validate([
            'barang' => 'required|min:6'
        ]);
        // echo "<pre>";
        // dump($request->all());
        // echo $kode;
        // echo "</pre>";
        $laporanDataSave = DataBarang::create([
            'barang' => $request->barang,
            'kode' => $kode
        ]);
         //if(isset($laporanDataSave)){
            return redirect()->route('data-barang-test.index')->with('success', 'Data Barang created successfully.');
         //}else{
             //return redirect()->route('laporan-data-test.index')->with('failed', 'Laporan Data failed');
         //}
    }

    public function edit($id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        // dump($laporanData->attributesToArray());

        return view('data-laporan.edit', compact('DataBarang'));
    }

    public function update(Request $request, $id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        $request->validate([
            'barang' => 'required'
        ]);

        // echo "<pre>";
        // dump($laporanData->attributesToArray());
        // echo "</pre>";
        $DataBarang->update([
            'barang' => $request->barang
        ]);

        return redirect()->route('data-laporan.index')->with('success', 'Data Barang updated successfully.');
    }

    public function destroy($id)
    {
        $DataBarang = DataBarang::FindOrFail($id);
        $DataBarang->delete();
        return redirect()->route('data-barang-test.index')->with('success', 'Data Barang deleted successfully.');
    }
}