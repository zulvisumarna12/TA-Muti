<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\DataBarang;
use App\Models\LaporanData;
use App\Models\LaporanPajak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = DataBarang::count();

        // Hitung total jenis barang
        $totalJenisBarang = JenisBarang::count();

        // Hitung jumlah penjualan
        $jumlahPenjualan = LaporanData::count();
        $laporanPajak = LaporanPajak::count();
        // Anda bisa menambahkan logika untuk mengambil data yang dibutuhkan di dashboard
        return view('dashboard.index',compact('totalBarang', 'totalJenisBarang', 'jumlahPenjualan','laporanPajak'));
    }
}
