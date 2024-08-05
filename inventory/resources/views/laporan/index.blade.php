@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success no-print">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1>Laporan Pajak</h1>
    <a href="{{ route('laporan-pajak.create') }}" class="btn btn-primary mb-2 no-print">Create Laporan Pajak</a>
    <button class="btn btn-primary mb-2 no-print" onclick="confirmPrint()">Print</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NPWP</th>
                    <th>Tanggal</th>
                    <th>Nomor Invoice</th>
                    <th>PPN 11%</th>
                    <th>DPP</th>
                    <th class="no-print">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $l_pajak)
                <tr>
                    <td>{{ $l_pajak->nama }}</td>
                    <td>{{ $l_pajak->npwp }}</td>
                    <td>{{ $l_pajak->created_at->format('d F Y') }}</td>
                    <td>{{ $l_pajak->no_invoice }}</td>
                    
                    <!-- Hitung total dari laporandata terkait dengan l_pajak -->
                    @php
                        $ppn = $l_pajak->total * 0.11; // PPN 11%
                    @endphp
                    
                    <td>Rp {{ number_format($ppn, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($l_pajak->total, 0, ',', '.') }}</td>
                    <td class="no-print">
                        <a href="{{ route('laporan-pajak.edit', $l_pajak->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('laporan-pajak.destroy', $l_pajak->id) }}" method="POST" style="display:inline;" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data tidak tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
