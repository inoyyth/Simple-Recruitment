<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelamar;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelamar::truncate();
        $csvFile = fopen(base_path("database/csv/pelamar.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                Pelamar::create([
                    "no_ktp" => $data['0'],
                    "nama_pelamar" => $data['1'],
                    "tanggal_lahir" => $data['2'],
                    "alamat" => $data['3'],
                    "email" => $data['4'],
                    "no_hp" => $data['5'],
                    "jenis_kelamin" => $data['6'],
                    "foto" => $data['7'],
                    "password" => bcrypt('password')
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
