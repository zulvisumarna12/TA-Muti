@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success no-print">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1>Laporan Penjualan</h1>
    <a href="{{ route('laporan-penjualan.create') }}" class="btn btn-primary mb-2 no-print">Create Laporan Data</a>
    <button class="btn btn-primary mb-2 no-print" onclick="confirmPrint()">Print</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th class="no-print">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                @foreach($laporanDatas as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->kode }}</td>
                    <td>{{ $data->barang }}</td>
                    <td>Rp {{ number_format($data->modal, 0, ',', '.') }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                    <td>{{ $data->created_at->format('d F Y') }}</td>
                    <td class="no-print">
                        <a href="{{ route('laporan-penjualan.edit', $data->id) }}" class="btn btn-warning no-print">Edit</a>
                        <form action="{{ route('laporan-penjualan.destroy', $data->id) }}" method="POST" style="display:inline;" class="no-print">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <h3>Total Penjualan: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPrint() {
        Swal.fire({
            title: 'Konfirmasi Print',
            text: 'Apakah Anda yakin ingin mencetak laporan ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, print it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.print();
            }
        });
    }
</script>
@endsection
