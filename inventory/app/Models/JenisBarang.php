<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_jenis_barang';
    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'kategori'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function barangs()
    {
        return $this->hasMany(DataBarang::class, 'id_jenis', 'id_jenis');
    }
}
