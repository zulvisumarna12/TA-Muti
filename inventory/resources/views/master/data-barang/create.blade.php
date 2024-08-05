@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Laporan Data</h1>
    <form action="{{ route('laporan-data-test.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label">Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
