<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['range' => 'Rp 1.000.000', 'nilai' => 5, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 2.000.000', 'nilai' => 4, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 3.000.000', 'nilai' => 3, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 4.000.000', 'nilai' => 2, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 5.000.000', 'nilai' => 1, 'kriteria_id' => Kriteria::find(1)->id],

            ['range' => '> 91', 'nilai' => 5, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '81 - 90', 'nilai' => 4, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '71 - 80', 'nilai' => 3, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '61 - 70', 'nilai' => 2, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '< 60', 'nilai' => 1, 'kriteria_id' => Kriteria::find(2)->id],

            ['range' => 'A', 'nilai' => 5, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'B', 'nilai' => 4, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'C', 'nilai' => 3, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'D', 'nilai' => 2, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'E', 'nilai' => 1, 'kriteria_id' => Kriteria::find(3)->id],

            ['range' => 'Ikut 3 eskul Lebih', 'nilai' => 5, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Ikut 2-3 Eskul', 'nilai' => 4, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Ikut 2 eskul', 'nilai' => 3, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Ikut 1 Eskul', 'nilai' => 2, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Tidak Pernah Ikut', 'nilai' => 1, 'kriteria_id' => Kriteria::find(4)->id],

            ['range' => 'Juara 1', 'nilai' => 5, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Juara 2', 'nilai' => 4, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Juara 3', 'nilai' => 3, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Berpartisipasi', 'nilai' => 2, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Tidak Pernah Berpartsipasi', 'nilai' => 1, 'kriteria_id' => Kriteria::find(5)->id],

        ];

        foreach ($data as $item) {
            Subkriteria::create([
                'range' => $item['range'],
                'nilai' => $item['nilai'],
                'kriteria_id' => $item['kriteria_id']
            ]);
        }
    }
}
