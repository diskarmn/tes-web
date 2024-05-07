<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TabelSatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        ['kode' => 'kg', 'nama' => 'Kilogram'],
        ['kode' => 'g', 'nama' => 'Gram'],
        ['kode' => 'l', 'nama' => 'Liter'],
        // Tambahkan data lain sesuai kebutuhan
    ];

    foreach ($data as $item) {
        \App\Models\TabelSatuanBarang::create($item);
    }
}

}
