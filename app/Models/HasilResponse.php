<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilResponse extends Model
{
    use HasFactory;
    protected $table = 'hasil_responses';

    protected $fillable = [
        'jenis_kelamin',
        'nama',
        'nama_jalan',
        'email',
        'angka_kurang',
        'angka_lebih',
        'profesi',
        'plain_json',
    ];

    protected $casts = [
        'jenis_kelamin' => 'integer',
        'angka_kurang' => 'integer',
        'angka_lebih' => 'integer',
    ];
}
