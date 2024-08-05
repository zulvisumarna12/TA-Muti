@extends('layouts.app')

@section('content')



<div class="container">
    <h1>Creat Data Barang</h1>
    <form action="{{ route('data-barang.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label">Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="mb-3">
            <label for="id_jenis" class="form-label">Kategori Barang</label>
            <select id="id_jenis" name="id_jenis" class="form-control" required>
                <option value="">-- Pilih Jenis Barang --</option>
                @foreach($jenisBarangs as $jenisBarang)
                    <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
