<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        $csvFile = fopen(base_path("database/csv/role.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE) {
            if (!$firstline) {
                Role::create([
                    'title' => $data['0']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
