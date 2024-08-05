@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Laporan Pajak</h1>
    <form action="{{ route('laporan-pajak.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" required>
        </div>
        <div class="mb-3">
            <label for="pilihan" class="form-label">Pilihan Penjualan</label>
            <select id="pilihan" class="form-control" required>
                <option value="">-- Pilih Barang Dari Penjualan --</option>
                @foreach($laporan_pajak as $pajak)
                    <option value="{{ $pajak->id }}" data-total="{{ $pajak->total }}">{{ $pajak->barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" required readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen dropdown dan input total
        const pilihan = document.getElementById('pilihan');
        const totalInput = document.getElementById('total');

        // Tambahkan event listener untuk perubahan dropdown
        pilihan.addEventListener('change', function() {
            // Ambil opsi yang dipilih
            const selectedOption = pilihan.options[pilihan.selectedIndex];
            // Ambil data-total dari opsi yang dipilih
            const totalValue = selectedOption.getAttribute('data-total');
            // Set nilai input total
            totalInput.value = totalValue;
        });
    });
</script>
@endsection
