@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Edit Penjualan</h1>
    <form action="{{ route('laporan-penjualan.update', $laporanData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $laporanData->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" value="{{$laporanData->barang}}" required readonly>
        </div>
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode" name="kode" value="{{$laporanData->kode}}" required readonly>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Penjualan</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$laporanData->jumlah}}" required>
        </div>
        <div class="mb-3">
            <label for="modal" class="form-label">Modal</label>
            <input type="number" class="form-control" id="modal" name="modal" value="{{$laporanData->modal}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
