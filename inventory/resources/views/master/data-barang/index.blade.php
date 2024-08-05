@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Data</h1>
    <a href="{{ route('data-barang.create') }}" class="btn btn-primary mb-2">Create Laporan Data</a>
    <a class="btn btn-primary mb-2" onclick="window.print()">Print</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Barang</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporanDatas as $data)
                <tr>
                    <td>{{ $data->kode }}</td>
                    <td>{{ $data->barang }}</td>
                    <td>
                    <a href="{{ route('data-barang.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('laporan-data-test.destroy', $data->id) }}" method="POST" style="display:inline;">
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
