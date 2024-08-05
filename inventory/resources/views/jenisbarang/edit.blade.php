@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori Barang</h1>
    <form action="{{ route('jenis-barang.update', $jenis_barang->id_jenis) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_jenis" class="form-label">Kategori Barang</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $jenis_barang->kategori) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
