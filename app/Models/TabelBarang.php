<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelBarang extends Model
{
    use HasFactory;

    protected $table = 'tabel_barang';

    protected $fillable = [
        'kd_kategori',
        'kd_satuan',
        'kode_barang',
        'nama',
        'jumlah',
        'id_user_insert',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->kode_barang) {
                $model->kode_barang = static::generateUniqueKodeBarang();
            }
        });
    }

  
}
