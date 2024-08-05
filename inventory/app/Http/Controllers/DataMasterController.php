<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataMasterController extends Controllers
{
    public function data_user(request $request){
        return view('users.index');
    }
    public function data_barang(request $request){
        return view('datamaster.databarang');
    }
    public function data_jenis(request $request){
        return view('datamaster.datajenisbarang');
    }
    public function data_laporan(request $request){
        return view('datalaporan.laporan');
    }
    public function data_pajak(request $request){
        return view('datalaporan.pajak');
    }
    public function dashboard(request $request){
        return view('dashboard');
    }
    public function transaksi(request $request){
        return view('datatransaksi');
    }
    public function profile(request $request){
        return view('profile');
    }
    
}
