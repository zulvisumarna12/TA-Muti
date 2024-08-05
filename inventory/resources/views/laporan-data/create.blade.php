@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('laporan-penjualan.store') }}" method="POST">
        @csrf
        <h1 class="text-center">Input laporan Penjualan</h1>
        <div class="mb-3">
            <label for="barang" class="form-label">Pilih Barang:</label>
            <select id="barang" name="id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" data-kode="{{ $barang->kode }}" data-harga="{{ $barang->harga }}" data-nama="{{ $barang->nama_barang }}">
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang:</label>
            <input type="text" class="form-control" id="kode" name="kode" readonly>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang:</label>
            <input type="text" class="form-control" id="harga" name="harga" readonly>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Banyak:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
        </div>

        <!-- Hidden input to store the selected barang's name -->
        <input type="hidden" id="nama_barang_hidden" name="nama_barang">
        <input type="hidden" id="" name="pajak_id" value="0">

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#barang').change(function() {
                var option = $(this).find('option:selected');
                var kode = option.data('kode');
                var harga = option.data('harga');
                var namaBarang = option.data('nama');
                
                $('#kode').val(kode);
                $('#harga').val(harga);
                $('#nama_barang_hidden').val(namaBarang); // Set hidden input value
            });
        });
    </script>
</div>
@endsection
