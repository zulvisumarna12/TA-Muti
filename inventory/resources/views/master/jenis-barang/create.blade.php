@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jenisbarang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
