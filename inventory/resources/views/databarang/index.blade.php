@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Data Barang</h1>
    <a href="{{ route('data-barang.create') }}" class="btn btn-primary mb-2">Create Barang</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                @foreach($DataBarang as $barang)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jenisbarang ? $barang->jenisBarang->kategori : 'N/A' }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>
                        <a href="{{ route('data-barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('data-barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
