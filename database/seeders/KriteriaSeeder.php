<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'POT', 'description' => 'Pendapatan Oran Tua', 'type' => 'cost', 'bobot' => 5],
            ['name' => 'NRT', 'description' => 'Nilai Rapot', 'type' => 'benefit', 'bobot' => 4],
            ['name' => 'ETK', 'description' => 'Etika', 'type' => 'benefit', 'bobot' => 5],
            ['name' => 'EKS', 'description' => 'Ektrakulikuler', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'PRT', 'description' => 'Prestasi', 'type' => 'benefit', 'bobot' => 3],
        ];

        foreach ($data as $key => $item) {
            Kriteria::create([
                'code' => $key + 1,
                'name' => $item['name'],
                'description' => $item['description'],
                'type' => $item['type'],
                'bobot' => $item['bobot'],
            ]);
        }
    }
}
