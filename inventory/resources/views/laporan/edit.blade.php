@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Laporan Pajak</h1>
    <form action="{{ route('laporan-pajak.update', $laporanPajak->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-2">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $laporanPajak->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp', $laporanPajak->npwp) }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" value="{{ old('total', $laporanPajak->total) }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="no_invoice" class="form-label">Nomor Invoice</label>
            <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="{{ old('no_invoice', $laporanPajak->no_invoice) }}" required readonly>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
