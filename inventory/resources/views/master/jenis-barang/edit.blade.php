@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jenisbarang.update', $jenisbarang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $jenisbarang->nama }}">
        </div>
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" name="kode" class="form-control" id="kode" value="{{ $jenisbarang->kode }}">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
