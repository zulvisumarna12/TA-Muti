@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jenis Barang</h1>
    <a href="{{ route('jenisbarang.create') }}" class="btn btn-primary mb-2">Tambah Jenis Barang</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jenisbarangs as $jenisbarang)
                <tr>
                    <td>{{ $jenisbarang->nama }}</td>
                    <td>{{ $jenisbarang->kode }}</td>
                    <td>
                        <a href="{{ route('jenisbarang.edit', $jenisbarang) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jenisbarang.destroy', $jenisbarang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
