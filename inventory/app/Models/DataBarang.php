<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBarang extends Model
{

    use HasFactory;
    protected $table = 'tbl_barang';

    
    protected $fillable = [
        'kode',
        'nama_barang',
        'id_jenis',
        'harga',
        'stok'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis', 'id_jenis');
    }
}
