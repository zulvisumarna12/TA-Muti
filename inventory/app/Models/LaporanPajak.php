<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPajak extends Model
{
    use HasFactory;

    protected $table = 'tbl_pajak';

    protected $fillable = [
        'nama',
        'npwp',
        'no_invoice',
        'total'
    ];

    public function laporandata()
    {
        return $this->hasMany(LaporanData::class, 'pajak_id');
    }
}
