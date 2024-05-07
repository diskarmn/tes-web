<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_kelamin')->insert([
            ['kode' => '1', 'jenis_kelamin' => 'laki-laki'],
            ['kode' => '2', 'jenis_kelamin' => 'perempuan'],
        ]);
    }
}
