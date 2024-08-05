@extends('layouts.app')

@section('content')
<style>
    .logo-img {
        max-height: 680px; /* Maksimal tinggi gambar */
        max-width: 100%;   /* Lebar maksimal 100% dari elemen induk */
        height: auto;      /* Jaga agar rasio aspek gambar tetap */
        width: auto;       /* Lebar otomatis */
    }
</style>
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <!-- Card Total Barang (Super Admin & Admin) -->
        @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin')
        <div class="col-md-4 mb-4">
            <a href="{{ route('data-barang.index') }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Barang</h5>
                        <p class="card-text">{{ $totalBarang }} items</p>
                    </div>
                    <div class="card-footer text-muted">
                        Jumlah total barang yang tersedia
                    </div>
                </div>
            </a>
        </div>
        @endif

        <!-- Card Total Jenis Barang (Super Admin & Admin) -->
        @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin')
        <div class="col-md-4 mb-4">
            <a href="{{ route('jenis-barang.index') }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori Barang</h5>
                        <p class="card-text">{{ $totalJenisBarang }} Kategori</p>
                    </div>
                    <div class="card-footer text-muted">
                        Jumlah jenis barang yang terdaftar
                    </div>
                </div>
            </a>
        </div>
        @endif

        <!-- Card Jumlah Penjualan (Super Admin, Admin, & Direktur) -->
        @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
        <div class="col-md-4 mb-4">
            <a href="{{ route('laporan-penjualan.index') }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Penjualan</h5>
                        <p class="card-text">{{ $jumlahPenjualan }} sales</p>
                    </div>
                    <div class="card-footer text-muted">
                        Total transaksi penjualan
                    </div>
                </div>
            </a>
        </div>
        @endif

        <!-- Card Laporan Pajak (Super Admin, Admin, & Direktur) -->
        @if (auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
        <div class="col-md-4 mb-4">
            <a href="{{ route('laporan-pajak.index') }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Pajak</h5>
                        <p class="card-text">{{ $laporanPajak }} Pajak</p>
                    </div>
                    <div class="card-footer text-muted">
                        Total Pajak
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>

    <img src="{{ asset('logo/Logo.jpeg') }}" alt="Logo" class="logo-img">
</div>
@endsection
