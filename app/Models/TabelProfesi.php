<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelProfesi extends Model
{
    use HasFactory;
    protected $table = 'tabel_profesi';

    protected $fillable = [
        'kode',
        'nama_profesi',
    ];
}
