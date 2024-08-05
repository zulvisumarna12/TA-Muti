@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Creat Kategori Barang</h1>
    <form action="{{ route('jenis-barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="total" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
