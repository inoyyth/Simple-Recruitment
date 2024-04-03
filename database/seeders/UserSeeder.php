<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $csvFile = fopen(base_path("database/csv/user.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                User::create([
                    "nip" => $data['0'],
                    "nama" => $data['1'],
                    "alamat" => $data['2'],
                    "email" => $data['3'],
                    "no_hp" => $data['4'],
                    "jenis_kelamin" => $data['5'],
                    "password" => bcrypt('password'),
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
