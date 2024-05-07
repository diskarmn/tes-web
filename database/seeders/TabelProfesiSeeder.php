<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TabelProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_profesi')->insert([
            ['kode' => 'A', 'nama_profesi' => 'Petani'],
            ['kode' => 'B', 'nama_profesi' => 'Teknisi'],
            ['kode' => 'C', 'nama_profesi' => 'Guru'],
            ['kode' => 'D', 'nama_profesi' => 'Nelayan'],
            ['kode' => 'E', 'nama_profesi' => 'Seniman'],
        ]);
    }
}
