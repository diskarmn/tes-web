<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TabelKategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'kcs', 'nama' => 'Kitchen Set'],
            ['kode' => 'bds', 'nama' => 'Bedroom Set'],
            ['kode' => 'fms', 'nama' => 'Family Set'],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($data as $item) {
            \App\Models\TabelKategoriBarang::create($item);
        }
    }
}
