@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success no-print">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1>Data Transaksi</h1>
    <button class="btn btn-primary mb-2 no-print" onclick="confirmPrint()">Print</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                @foreach($transaksi as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->barang }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="showDetails({{ $data->id }})">Detail</button>
                    </td>
                </tr>
                @endforeach
                <tr class="print-only">
                    <td colspan="3" class="text-right"><strong>Total Keseluruhan</strong></td>
                    <td><strong>Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</strong></td>
                </tr>
                <tr class="print-only">
                    <td colspan="3" class="text-right"><strong>Pajak PPN (11%)</strong></td>
                    <td><strong>Rp {{ number_format($ppn, 0, ',', '.') }}</strong></td>
                </tr>
                <tr class="print-only">
                    <td colspan="3" class="text-right"><strong>Total Setelah Pajak PPN</strong></td>
                    <td><strong>Rp {{ number_format($totalSetelahPajak, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal HTML -->
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Konten modal akan dimasukkan di sini -->
                <div id="modal-body-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="printModal()">Print</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showDetails(id) {
        // Mengambil data menggunakan AJAX
        fetch(`/transaksi/${id}`)
            .then(response => response.json())
            .then(data => {
                // Mengisi modal dengan tabel data dan informasi tambahan
                document.getElementById('modal-body-content').innerHTML = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${data.barang}</td>
                                <td>${data.jumlah}</td>
                                <td>Rp ${data.total.toLocaleString('id-ID')}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered print-only">
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total Keseluruhan</strong></td>
                                <td><strong>Rp ${data.totalKeseluruhan.toLocaleString('id-ID')}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Pajak PPN (11%)</strong></td>
                                <td><strong>Rp ${data.ppn.toLocaleString('id-ID')}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total Setelah Pajak PPN</strong></td>
                                <td><strong>Rp ${data.totalSetelahPajak.toLocaleString('id-ID')}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                `;
                // Menampilkan modal
                $('#transactionModal').modal('show');
            });
    }

    function printModal() {
        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">');
        printWindow.document.write('<style> .print-only { display: table !important; } </style>'); // Menampilkan elemen dengan class print-only
        printWindow.document.write('</head><body >');
        printWindow.document.write(document.getElementById('modal-body-content').innerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    }

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
