<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanData;

class PrintController extends Controller
{
    public function printView()
    {
        $data = LaporanData::all();
        return view('print-view.index', compact('data'));
    }
}