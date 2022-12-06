<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matakuliah = [
            [
                'nama' => 'Pemrograman Dasar'
            ],
            [
                'nama' => 'Pemrograman Lanjut'
            ],
            [
                'nama' => 'Algoritma dan Struktur Data'
            ],
            [
                'nama' => 'Sistem Basis Data'
            ],
            [
                'nama' => 'Jaringan Komputer Dasar'
            ]
            ];
            Matakuliah::insert($matakuliah);
    }
}
