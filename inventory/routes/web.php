<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangMaster;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanDataController;
use App\Http\Controllers\MasterJenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
   return redirect('/login');
});
   Route::get('/home', [DashboardController::class, 'index'])->name('home');
   Route::resource('users', UserController::class);
   Route::resource('jenis-barang', MasterJenisBarangController::class);
   Route::get('data_barang',[DataBarangMaster::class,'index'])->name('data_barang');
   Route::resource('data-barang', DataBarangMaster::class);
   Route::resource('laporan-penjualan', LaporanDataController::class);
   Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
   Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
   Route::get('/laporan_data', [LaporanDataController::class, 'Index'])->name('laporan');
   Route::get('/laporan_pajak', [LaporanController::class, 'index'])->name('pajak');
   Route::resource('laporan-pajak',LaporanController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// routes/web.php

