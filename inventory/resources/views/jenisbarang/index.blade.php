@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Kategori Barang</h1>
    <a href="{{ route('jenis-barang.create') }}" class="btn btn-primary mb-2">Create Jenis Barang</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                @foreach($data as $jenis_barang)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $jenis_barang->kategori }}</td>
                    <td>{{ $jenis_barang->created_at->format('d F Y') }}</td>
                    <td>
                        <a href="{{ route('jenis-barang.edit', $jenis_barang->id_jenis) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jenis-barang.destroy', $jenis_barang->id_jenis) }}" method="POST" style="display:inline;">
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
