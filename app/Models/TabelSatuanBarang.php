<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelSatuanBarang extends Model
{
    use HasFactory;

    protected $table = 'tabel_satuan_barang';

    protected $fillable = [
        'kode',
        'nama',
    ];
}
