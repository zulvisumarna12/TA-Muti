<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;
use Illuminate\Support\Str;


class MasterJenisBarangController extends Controller
{
    public function index()
    {
        $data = JenisBarang::orderBy('created_at', 'desc')->get();
        return view('jenisbarang.index',compact('data'));
    }

    public function create()
    {
        return view('jenisbarang.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'kategori' => 'required',
        ]);

        JenisBarang::create([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $jenis_barang = JenisBarang::FindOrFail($id);
        return view('jenisbarang.edit', compact('jenis_barang'));
    }

    public function update(Request $request, $id)
    {
        $jenisBarang = JenisBarang::FindOrFail($id);
        $request->validate([
                'kategori'=> 'required'
        ]);

        $jenisBarang->update([
            'kategori'  => $request->kategori
        ]);
        
    
        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $jenisbarang = JenisBarang::FindOrFail($id);
        $jenisbarang->delete();
        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Dihapus');
    }
}
