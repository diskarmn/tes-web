<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelKategoriBarang extends Model
{
    use HasFactory;
    protected $table = 'tabel_kategori_barang';

    protected $fillable = [
        'kode',
        'nama',
    ];
}
