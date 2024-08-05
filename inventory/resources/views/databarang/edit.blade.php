@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Barang</h1>
    <form action="{{ route('data-barang.update', $DataBarang->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $DataBarang->nama_barang) }}" required>
        </div>

        <div class="mb-3">
            <label for="Kode" class="form-label">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode', $DataBarang->kode) }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="Kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $DataBarang->JenisBarang->kategori) }}" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $DataBarang->harga) }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="Stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $DataBarang->stok) }}" step="0.01" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
