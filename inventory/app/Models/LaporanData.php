<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LaporanData extends Model
{

    protected $table = 'tbl_laporan_data';

    
    protected $fillable = [
        'pajak_id',
        'barang',
        'kode',
        'jumlah',
        'modal',
        'total'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function pajak()
    {
        return $this->belongsTo(LaporanPajak::class, 'pajak_id');
    }

}
